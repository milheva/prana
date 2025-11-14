<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoiceMail;

class InvoiceController extends Controller
{
    /**
     * Display invoice
     */
    public function show(Order $order)
    {
        // Authorization check
        if (auth()->id() !== $order->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized access to invoice.');
        }

        $order->load('items.product', 'user');

        return view('invoices.show', compact('order'));
    }

    /**
     * Download invoice as PDF
     */
    public function downloadPdf(Order $order)
    {
        // Authorization check
        if (auth()->id() !== $order->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized access to invoice.');
        }

        $order->load('items.product', 'user');

        $pdf = Pdf::loadView('invoices.pdf', compact('order'));

        return $pdf->download('invoice-' . $order->order_number . '.pdf');
    }

    /**
     * Download invoice as JPG
     */
    public function downloadJpg(Order $order)
    {
        // Authorization check
        if (auth()->id() !== $order->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized access to invoice.');
        }

        $order->load('items.product', 'user');

        // Check if Imagick extension is available
        if (!extension_loaded('imagick')) {
            // Fallback: return PDF if Imagick not installed
            $pdf = Pdf::loadView('invoices.pdf', compact('order'));
            return $pdf->download('invoice-' . $order->order_number . '.pdf');
        }

        // Generate PDF first
        $pdf = Pdf::loadView('invoices.pdf', compact('order'));
        $pdfPath = storage_path('app/temp/invoice-' . $order->order_number . '.pdf');

        // Create temp directory if not exists
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $pdf->save($pdfPath);

        // Convert PDF to JPG using Imagick
        try {
            $imagick = new \Imagick();
            $imagick->setResolution(300, 300);
            $imagick->readImage($pdfPath);
            $imagick->setImageFormat('jpg');
            $imagick->setImageCompressionQuality(90);

            $jpgPath = storage_path('app/temp/invoice-' . $order->order_number . '.jpg');
            $imagick->writeImage($jpgPath);
            $imagick->clear();
            $imagick->destroy();

            // Clean up PDF
            unlink($pdfPath);

            return response()->download($jpgPath)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            // Fallback: return PDF if conversion fails
            if (file_exists($pdfPath)) {
                return response()->download($pdfPath)->deleteFileAfterSend(true);
            }
            return back()->with('error', 'Gagal mengkonversi invoice ke JPG: ' . $e->getMessage());
        }
    }

    /**
     * Send invoice via email
     */
    public function sendEmail(Order $order)
    {
        // Authorization check
        if (auth()->id() !== $order->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized access to invoice.');
        }

        $order->load('items.product', 'user');

        try {
            Mail::to($order->user->email)->send(new OrderInvoiceMail($order));

            return back()->with('success', 'Invoice berhasil dikirim ke email Anda: ' . $order->user->email);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email. Silakan coba lagi.');
        }
    }
}

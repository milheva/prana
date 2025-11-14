@auth
    <script>
        // Session Timeout Warning
        let sessionWarningShown = false;
        const sessionLifetime = {{ config('session.lifetime') }} * 60 * 1000;
        const warningTime = sessionLifetime - (60 * 1000); // Show warning 1 minute before timeout

        let lastActivityTime = Date.now();
        let warningTimeout;
        let logoutTimeout;

        function resetSessionTimers() {
            clearTimeout(warningTimeout);
            clearTimeout(logoutTimeout);
            lastActivityTime = Date.now();
            sessionWarningShown = false;

            warningTimeout = setTimeout(showSessionWarning, warningTime);

            logoutTimeout = setTimeout(logoutDueToInactivity, sessionLifetime);
        }

        function showSessionWarning() {
            if (!sessionWarningShown) {
                sessionWarningShown = true;

                // Show DaisyUI toast notification
                const toast = document.createElement('div');
                toast.className = 'toast toast-center toast-top z-50';
                toast.innerHTML = `
            <div class="alert alert-warning shadow-lg max-w-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <div>
                    <h3 class="font-bold">Sesi Akan Berakhir</h3>
                    <div class="text-xs">Sesi Anda akan berakhir dalam 1 menit karena tidak aktif. Lakukan aktivitas untuk melanjutkan.</div>
                </div>
                <button onclick="this.parentElement.parentElement.remove(); resetSessionTimers();" class="btn btn-sm btn-ghost">
                    OK
                </button>
            </div>
        `;
                document.body.appendChild(toast);

                setTimeout(() => {
                    if (toast.parentElement) {
                        toast.remove();
                    }
                }, 8000);
            }
        }

        function logoutDueToInactivity() {
            // Show logout form and submit
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('logout') }}';
            form.innerHTML = '@csrf';
            document.body.appendChild(form);
            form.submit();
        }

        // Track user activity
        const activityEvents = ['mousedown', 'keypress', 'scroll', 'touchstart', 'click'];
        activityEvents.forEach(event => {
            document.addEventListener(event, () => {
                const timeSinceLastActivity = Date.now() - lastActivityTime;

                // Only reset if more than 10 seconds has passed since last activity
                if (timeSinceLastActivity > 10000) {
                    resetSessionTimers();

                    // Ping server to update session
                    fetch('{{ route('home') }}', {
                        method: 'GET',
                        credentials: 'same-origin'
                    }).catch(() => {});
                }
            }, {
                passive: true
            });
        });

        // Initialize timers on page load
        resetSessionTimers();
    </script>
@endauth

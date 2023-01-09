@props([
    'title' => __('Deactivate account!'),
    'message' => __('Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.'),
    'button' => __('Deactivate'),
])

<script>
    function closePopup() {
        const popup = document.getElementById("popup") ?? false;
        const modals = document.getElementById("modals") ?? false;
        const backdrop = document.getElementById("backdrop") ?? false;

        if (popup) {
            popup.classList.add("ease-out", "duration-200");
            setTimeout(() => {
                popup.classList.add("opacity-100");
            }, 100);
            setTimeout(() => {
                popup.classList.add("opacity-0");
            }, 150);
            setTimeout(() => {
                popup.classList.remove("opacity-100");
            }, 200);
            setTimeout(() => {
                popup.classList.add("hidden", "-z-10");
                popup.classList.remove("ease-out", "duration-200");
                popup.classList.remove("opacity-0");
            }, 250);
        }

        if (modals) {
            modals.classList.add("ease-out", "duration-300");
            setTimeout(() => {
                modals.classList.add("opacity-0", "translate-y-4", "sm:translate-y-0", "sm:scale-95");
            }, 300);
            setTimeout(() => {
                modals.classList.add("opacity-100", "translate-y-0", "sm:scale-100");
            }, 320);

            setTimeout(() => {
                modals.classList.remove("opacity-0", "translate-y-4", "sm:translate-y-0", "sm:scale-95");
            }, 350);

            setTimeout(() => {
                modals.classList.add("hidden", "-z-10");
            }, 400);
        }

    }

    function popupAction(submitForm = "", title = "{{ __($title) }}", message = "{{ __($message) }}", button =
        "{{ __($button) }}") {
        const popup = document.getElementById("popup") ?? false;
        const modals = document.getElementById("modals") ?? false;
        const popupMessage = document.getElementById("popupMessage");
        const backdrop = document.getElementById("backdrop") ?? false;

        const popupTitle = document.getElementById("popupTitle");
        const popupButton = document.getElementById("popupButton");

        popupTitle.innerText = title;
        popupMessage.innerText = message;
        popupButton.innerText = button;

        // set submit form
        localStorage.setItem("submitForm", submitForm);

        if (popup) {
            popup.classList.add("ease-in-out", "duration-200");

            setTimeout(() => {
                popup.classList.add("opacity-0");
            }, 100);
            setTimeout(() => {
                popup.classList.remove("hidden", "-z-10");
            }, 150);
            setTimeout(() => {
                popup.classList.add("opacity-100");
            }, 200);
            setTimeout(() => {
                popup.classList.remove("opacity-0");
            }, 250);
        }

        if (modals) {
            modals.classList.remove("ease-out", "duration-300");
            setTimeout(() => {
                modals.classList.add("opacity-0", "translate-y-4", "sm:translate-y-0", "sm:scale-95");
            }, 300);
            setTimeout(() => {
                modals.classList.remove("hidden", "-z-10");
            }, 320);
            setTimeout(() => {
                modals.classList.add("opacity-100", "translate-y-0", "sm:scale-100");
            }, 350);
            setTimeout(() => {
                modals.classList.remove("opacity-0", "translate-y-4", "sm:translate-y-0", "sm:scale-95");
            }, 400);
        }

    }

    function submitPopupAction() {
        let submitForm = localStorage.getItem("submitForm");
        let form = document.getElementById(submitForm);
        if (form) {
            form.submit();
        }
    }
</script>

<div id="popup" class="relative hidden z-10  " aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div id="backdrop" class="fixed inset-0 bg-slate-900/30 dark:bg-black/50 transition-all duration-300 ">
    </div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
            <div id="modals"
                class="hidden z-10 relative transform overflow-hidden rounded-lg border drop-shadow-2xl border-gray-100 dark:border-slate-800 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div
                    class="bg-white dark:bg-slate-800 dark:text-white border-gray-100 dark:border-slate-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation-triangle -->
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white" id="popupTitle">
                                {{ __($title) }}
                            </h3>
                            <div class="mt-2">
                                <p id="popupMessage" class="text-sm text-gray-500 dark:text-slate-100">
                                    {{ __($message) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-gray-50 dark:bg-gray-800/80 border-gray-100 dark:border-slate-600 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" onclick="submitPopupAction()" id="popupButton"
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">{{ __($button) }}</button>
                    <button type="button" onclick="closePopup()"
                        class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">{{ __('Cancel') }}</button>
                </div>
            </div>
        </div>
    </div>

</div>

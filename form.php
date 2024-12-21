<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Fungsi untuk format input menjadi Rupiah
        function formatRupiah(input) {
            let value = input.value.replace(/[^,\d]/g, '');
            let numberString = value.toString().split(',');
            let sisa = numberString[0].length % 3;
            let rupiah = numberString[0].substr(0, sisa);
            let ribuan = numberString[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            input.value = rupiah;
        }

        // Fungsi untuk validasi dan submit form
        async function handleSubmit(event) {
            event.preventDefault();
            
            const minBudget = document.getElementById('min-budget').value;
            const maxBudget = document.getElementById('max-budget').value;

            if (!minBudget || !maxBudget) {
                alert('Please fill in both Min Budget and Max Budget fields.');
                return;
            }

            // Show loading state
            const submitButton = event.target.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.innerHTML = `
                <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Submitting...
            `;

            try {
                const formData = new FormData(event.target);
                const response = await fetch('process_consultation.php', {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    // Show success modal
                    document.getElementById('successModal').classList.remove('hidden');
                    
                    // Automatically redirect after 3 seconds
                    setTimeout(() => {
                        window.location.href = 'consultation_history.php';
                    }, 3000);
                } else {
                    throw new Error('Form submission failed');
                }
            } catch (error) {
                alert('An error occurred while submitting the form. Please try again.');
                console.error('Submission error:', error);
                
                // Reset button state
                submitButton.disabled = false;
                submitButton.innerHTML = 'Contact Further';
            }
        }

        // Close modal function
        function closeModal() {
            document.getElementById('successModal').classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Include Navbar -->
    <?php include('includes/navbarDashboard.php'); ?>

    <!-- Success Modal -->
    <div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full mx-4">
            <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Form Submitted Successfully!</h3>
                <p class="mt-2 text-sm text-gray-500">Your consultation request has been received. Redirecting to consultation history...</p>
                <button onclick="closeModal()" class="mt-4 bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800">Close</button>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto mt-10 flex items-start gap-6">
        <!-- Button Back -->
        <a
            href="javascript:history.back()"
            class="bg-black text-white px-3 py-2 text-sm rounded-md flex items-center justify-center shadow-sm transition-transform duration-200 hover:scale-110"
            style="width: 50px; height: 50px;"
        >
            <svg
                width="24"
                height="24"
                viewBox="0 0 52 51"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <rect width="51.0781" height="51" rx="8" fill="black" />
                <path
                    d="M24.6544 36L14.0391 25.5L24.6544 15M15.5134 25.5H37.0391"
                    stroke="white"
                    stroke-width="2.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </a>

        <!-- Form Container -->
        <div class="w-full bg-white border border-gray-300 shadow-md rounded-lg p-6 mb-16">
            <!-- Title Section -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Consultation Detail</h1>
                <hr class="mt-2 border-gray-600">
            </div>

            <!-- Form -->
            <form onsubmit="handleSubmit(event)" class="space-y-6">
                <!-- Company Detail -->
                <div>
                    <h2 class="text-xl font-semibold mb-2">Company Detail</h2>
                    <p class="text-gray-500 text-sm mb-4">Tell us about your company</p>

                    <div class="space-y-4">
                        <div>
                            <label for="company-name" class="block text-sm font-medium text-gray-700">Company Name</label>
                            <input type="text" id="company-name" name="company-name" placeholder="e.g. SES" required
                                class="mt-1 p-2 block w-full border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="company-field" class="block text-sm font-medium text-gray-700">Company Field</label>
                            <input type="text" id="company-field" name="company-field" placeholder="e.g. Retail, Architectural, etc." required
                                class="mt-1 p-2 block w-full border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="company-size" class="block text-sm font-medium text-gray-700">Company Size</label>
                            <input type="text" id="company-size" name="company-size" placeholder="Number of Employees" required
                                class="mt-1 p-2 block w-full border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="company-address" class="block text-sm font-medium text-gray-700">Company Address</label>
                            <input type="text" id="company-address" name="company-address" placeholder="City and District of your company" required
                                class="mt-1 p-2 block w-full border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Consultation Detail -->
                <div>
                    <h2 class="text-xl font-semibold mb-2">Consultation Detail</h2>
                    <p class="text-gray-500 text-sm mb-4">Tell us about your concerns</p>

                    <div class="space-y-4">
                        <div>
                            <label for="current-lighting" class="block text-sm font-medium text-gray-700">Current Lighting Setup</label>
                            <textarea id="current-lighting" name="current-lighting" rows="3" placeholder="Type your message here" required
                                class="mt-1 p-2 block w-full border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <div>
                            <label for="problem-detail" class="block text-sm font-medium text-gray-700">Problem Detail</label>
                            <textarea id="problem-detail" name="problem-detail" rows="3" placeholder="Type your message here" required
                                class="mt-1 p-2 block w-full border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <div>
                            <label for="goals" class="block text-sm font-medium text-gray-700">Goals</label>
                            <textarea id="goals" name="goals" rows="3" placeholder="Type your message here" required
                                class="mt-1 p-2 block w-full border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Budget Range -->
                <div>
                    <label for="budget-range" class="block text-sm font-medium text-gray-700">Budget Range</label>
                    <div class="flex gap-4">
                        <input 
                            type="text" 
                            id="min-budget" 
                            name="min-budget" 
                            placeholder="Min Rp" 
                            class="mt-1 p-2 block w-full border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            oninput="formatRupiah(this)" 
                            required>
                        <input 
                            type="text" 
                            id="max-budget" 
                            name="max-budget" 
                            placeholder="Max Rp" 
                            class="mt-1 p-2 block w-full border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            oninput="formatRupiah(this)" 
                            required>
                    </div>
                </div>

                <!-- Privacy and Updates Section -->
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input
                                id="privacy-policy"
                                name="privacy-policy"
                                type="checkbox"
                                required
                                class="h-4 w-4 rounded border-gray-600"
                            >
                        </div>
                        <div class="ml-3">
                            <label for="privacy-policy" class="text-sm text-gray-700">
                                I agree to the privacy policy and terms of service
                            </label>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input
                                id="updates-promotion"
                                name="updates-promotion"
                                type="checkbox"
                                class="h-4 w-4 rounded border-gray-600"
                            >
                        </div>
                        <div class="ml-3">
                            <label for="updates-promotion" class="text-sm text-gray-700">
                                I would like to receive updates and promotional materials
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-start">
                    <button type="submit" class="px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-gray-800 flex items-center space-x-2">
                        <span>Contact Further</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
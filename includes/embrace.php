<div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="flex flex-col lg:flex-row justify-start items-start lg:items-end gap-12 lg:gap-24">
            <!-- Left Section -->
            <div class="flex flex-col justify-start items-start gap-5 max-w-xs">
                <div class="flex flex-col justify-start items-start max-w-xs">
                    <h1 class="text-black text-[38px] font-light leading-normal tracking-tight">
                        Embrace Future Light To Your Workspace
                    </h1>
                    <p class="text-gray-400 text-[38px] font-light leading-normal tracking-tight">
                        With Four Simple Steps
                    </p>
                </div>
                <img 
                    src="assets/image/Hand-held Beacon of Inspiration Against Sunset 1.png"
                    alt="Hand-held light bulb against sunset" 
                    class="rounded-lg w-full max-w-xs h-auto"
                />
            </div>

            <!-- Right Section -->
            <div class="flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-full">
                    <?php
                    $steps = [
                        [
                            "title" => "Book a Consultation",
                            "description" => "Take the first step by booking a consultation with our team. This helps us schedule a convenient time to evaluate your lighting needs.",
                        ],
                        [
                            "title" => "Site Survey",
                            "description" => "Our experts will visit your location to understand your requirements, assess the space, and gather all necessary details to recommend the ideal lighting solutions.",
                        ],
                        [
                            "title" => "Sign Off",
                            "description" => "Review the proposed plan and confirm the details. Once everything is approved, we'll move forward to bring your lighting vision to life.",
                        ],
                        [
                            "title" => "Get Your Light",
                            "description" => "Enjoy a seamless experience as we deliver and install your chosen lighting solutions, transforming your space effortlessly.",
                        ]
                    ];

                    foreach ($steps as $index => $step) {
                        $stepNumber = $index + 1;
                        echo "
                        <div class='bg-white rounded-lg shadow-md p-12 flex flex-col gap-8 h-full'>
                            <div class='flex items-center gap-4'>
                                <div class='bg-black text-white text-center rounded w-12 h-12 flex items-center justify-center'>
                                    <p class='text-[32px] font-normal tracking-tight'>{$stepNumber}</p>
                                </div>
                                <h2 class='text-black text-xl font-normal'>{$step['title']}</h2>
                            </div>
                            <p class='text-black text-base font-normal leading-relaxed flex-grow'>
                                {$step['description']}
                            </p>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- Smart Section Container -->
<section class="w-full py-24">
  <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row gap-12">
      <!-- Left Content -->
      <div class="lg:w-1/3 grid grid-rows-2 gap-8">
        <!-- Content remains the same -->
      </div>

      <!-- Right Content - Cards Grid -->
      <div class="lg:w-2/3 flex gap-4">
        <!-- Content remains the same -->
      </div>
    </div>
  </div>
</section>
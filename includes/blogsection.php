<!-- Blog Section -->
<section class="blog-section max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-24">
  <!-- Header with Dropdowns -->
  <div class="flex justify-between items-center mb-8">
    <div class="flex gap-1">
      <select class="p-2.5 text-base border border-gray-300 rounded-lg bg-white font-['Plus_Jakarta_Sans'] cursor-pointer">
        <option value="latest">Latest</option>
        <option value="popular">Popular</option>
        <option value="recommended">Recommended</option>
      </select>
      <select class="p-2.5 text-base border border-gray-300 rounded-lg bg-white font-['Plus_Jakarta_Sans'] cursor-pointer">
        <option value="all">Category</option>
        <option value="technology">Technology</option>
        <option value="lifestyle">Lifestyle</option>
        <option value="business">Business</option>
      </select>
    </div>
  </div>

  <!-- Card Container -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card 1 -->
    <div class="flex flex-row items-start gap-5 p-5 bg-white shadow-md rounded-lg transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
      <div class="flex-none w-[150px] h-full rounded-lg bg-gradient-to-r from-[#ff6b6b] to-[#845ec2]"></div>
      <div class="flex-1 flex flex-col justify-center">
        <h2 class="text-xl font-semibold font-['Plus_Jakarta_Sans'] text-black mb-2.5">Blog Title</h2>
        <p class="text-sm text-gray-600 mb-4 leading-relaxed font-['Plus_Jakarta_Sans']">Beautifully designed components built with Radix UI and Tailwind CSS.</p>
        <a href="#" class="text-sm text-[#845ec2] no-underline font-medium font-['Plus_Jakarta_Sans'] hover:text-[#ff6b6b] hover:underline">Styles for headings, paragraphs, lists...etc</a>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="flex flex-row items-start gap-5 p-5 bg-white shadow-md rounded-lg transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
      <div class="flex-none w-[150px] h-full rounded-lg bg-gradient-to-r from-[#ff6b6b] to-[#845ec2]"></div>
      <div class="flex-1 flex flex-col justify-center">
        <h2 class="text-xl font-semibold font-['Plus_Jakarta_Sans'] text-black mb-2.5">Another Blog Title</h2>
        <p class="text-sm text-gray-600 mb-4 leading-relaxed font-['Plus_Jakarta_Sans']">Learn how to craft better UI/UX for your projects with modern tools.</p>
        <a href="#" class="text-sm text-[#845ec2] no-underline font-medium font-['Plus_Jakarta_Sans'] hover:text-[#ff6b6b] hover:underline">Explore styles and techniques...</a>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="flex flex-row items-start gap-5 p-5 bg-white shadow-md rounded-lg transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
      <div class="flex-none w-[150px] h-full rounded-lg bg-gradient-to-r from-[#ff6b6b] to-[#845ec2]"></div>
      <div class="flex-1 flex flex-col justify-center">
        <h2 class="text-xl font-semibold font-['Plus_Jakarta_Sans'] text-black mb-2.5">Yet Another Blog</h2>
        <p class="text-sm text-gray-600 mb-4 leading-relaxed font-['Plus_Jakarta_Sans']">A quick dive into responsive web design and accessibility tips.</p>
        <a href="#" class="text-sm text-[#845ec2] no-underline font-medium font-['Plus_Jakarta_Sans'] hover:text-[#ff6b6b] hover:underline">Discover more...</a>
      </div>
    </div>
  </div>

  <!-- Footer Note -->
  <div class="text-center mt-12 font-['Plus_Jakarta_Sans'] text-sm text-gray-600">
    <a href="#" class="text-[#845ec2] no-underline font-medium hover:underline">Browse all posts</a>
  </div>

  <!-- CTA Section -->
  <div class="text-center max-w-[579px] mx-auto mt-24">
    <div class="space-y-4">
      <p class="text-[46px] font-thin font-['Plus_Jakarta_Sans'] leading-[46px] tracking-[-3px]">Be part of future hope with</p>
      <p class="text-[46px] text-black font-thin font-['Plus_Jakarta_Sans'] tracking-[-3px]">light that planet smiles to you</p>
      <p class="text-2xl text-gray-500 font-thin font-['Plus_Jakarta_Sans'] tracking-[-2px]">When artistry meets efficiency, Shine Smarter Work Better</p>
    </div>
    <button class="mt-8 bg-black text-white border-none outline-none flex justify-center items-center gap-2.5 px-8 py-3 rounded-full hover:bg-gray-800 transition-colors duration-300 mx-auto">
      Book a Consultation
    </button>
  </div>
</section>
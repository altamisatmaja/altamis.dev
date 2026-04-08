<section id="about" class="py-36 px-6" style="background: var(--page-bg);">
  <div class="max-w-3xl mx-auto text-center mb-12">
    <p class="text-xs font-semibold tracking-widest uppercase mb-4" style="color: var(--text-tertiary);">About</p>
    <h2 class="text-4xl md:text-5xl font-bold tracking-tight mb-4" style="color: var(--text-primary); letter-spacing: -0.03em;">
      Software engineer building products for Indonesia and beyond
    </h2>
    <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-secondary);">
      Based in Indonesia and available for product work with startups and businesses across the country, including East Java.
    </p>
  </div>
  <div class="max-w-3xl mx-auto flex flex-col gap-4">

    <!-- Row 1 -->
    <div class="grid grid-cols-5 gap-4">

      <!-- Card 1: Intro -->
      <div class="col-span-5 md:col-span-2 rounded-3xl p-8 flex flex-col justify-between min-h-[420px] overflow-hidden relative" style="background: var(--surface-1); box-shadow: var(--shadow-soft);">
        <p class="text-3xl font-bold leading-snug z-10 relative" style="color: var(--text-primary);">
          Full-stack developer
          <span style="color: var(--text-secondary);" class="font-semibold"> with a love for clean UI and fast apps</span>
        </p>
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-48 pointer-events-none">
          <img src="/storage/assets/images/altamis-full-stack-imge.png" alt="Full Stack" class="w-full object-contain" />
        </div>
      </div>

      <!-- Right column -->
      <div class="col-span-5 md:col-span-3 flex flex-col gap-4">

        <!-- Card 2: Location -->
        <div class="rounded-3xl p-7 flex-1" style="background: var(--surface-1); box-shadow: var(--shadow-soft);">
          <p class="text-xs font-semibold tracking-widest uppercase mb-1" style="color: var(--text-tertiary);">Based In</p>
          <p class="text-3xl font-bold mb-6" style="color: var(--text-primary);">Indonesia</p>
          <p class="text-sm mb-5 max-w-sm" style="color: var(--text-secondary);">
            Working remotely with teams across Indonesia, including East Java, on web, mobile, and backend products.
          </p>
          <div class="flex items-end justify-center gap-5 mt-4">
            {#each [
              { active: false, scale: 'scale-75 opacity-40' },
              { active: false, scale: 'scale-90 opacity-60' },
              { active: true,  scale: 'scale-110' },
              { active: false, scale: 'scale-90 opacity-60' },
              { active: false, scale: 'scale-75 opacity-40' },
            ] as pin}
              <div class="flex flex-col items-center transition-all {pin.scale}">
                <div class="relative flex items-center justify-center {pin.active ? 'w-20 h-20' : 'w-10 h-10'}">
                  <svg viewBox="0 0 40 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                    <path d="M20 2C11.163 2 4 9.163 4 18C4 29 20 46 20 46C20 46 36 29 36 18C36 9.163 28.837 2 20 2Z"
                      fill="{pin.active ? 'var(--accent-strong)' : 'var(--surface-strong)'}" />
                    <circle cx="20" cy="18" r="6"
                      fill="{pin.active ? 'var(--text-contrast)' : 'var(--text-tertiary)'}" />
                  </svg>
                </div>
                <div class="w-3 h-1 rounded-full mt-0.5" style="background: {pin.active ? 'var(--accent-strong)' : 'var(--text-tertiary)'}; opacity: {pin.active ? 0.4 : 0.3};"></div>
              </div>
            {/each}
          </div>
        </div>

        <!-- Card 3: Coding Since -->
        <div class="rounded-3xl p-7 flex-1" style="background: var(--surface-1); box-shadow: var(--shadow-soft);">
          <p class="text-xs font-semibold tracking-widest uppercase mb-1" style="color: var(--text-tertiary);">Coding Since</p>
          <p class="text-3xl font-bold mb-4" style="color: var(--text-primary);">August 2022</p>
          <div class="rounded-2xl overflow-hidden" style="background: var(--surface-2);">
            <div class="flex items-center gap-1.5 px-4 py-2.5" style="border-bottom: 1px solid var(--line-soft);">
              <div class="w-2.5 h-2.5 rounded-full" style="background: var(--surface-strong);"></div>
              <div class="w-2.5 h-2.5 rounded-full" style="background: var(--surface-strong);"></div>
              <div class="w-2.5 h-2.5 rounded-full" style="background: var(--surface-strong);"></div>
            </div>
            <pre class="text-sm font-mono px-4 py-4 leading-relaxed" style="color: var(--text-secondary);">&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
  &lt;meta charset="UTF-8"/&gt;
  &lt;title&gt;Hi, I'm Altamis&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;</pre>
          </div>
        </div>

      </div>
    </div>

    <!-- Row 2 -->
    <div class="grid grid-cols-5 gap-4">

      <!-- Card 4: What I Do -->
      <div class="col-span-5 md:col-span-2 rounded-3xl p-8 min-h-[240px] flex flex-col justify-between" style="background: var(--surface-1); box-shadow: var(--shadow-soft);">
        <span class="self-start text-xs font-semibold tracking-widest uppercase px-4 py-1.5 rounded-full" style="background: var(--surface-2); color: var(--text-secondary);">What I Do</span>
        <p class="text-3xl font-bold leading-snug mt-6" style="color: var(--text-primary);">
          Focused on fast builds, clean code,
          <span style="color: var(--text-secondary);" class="font-semibold"> and smart design</span>
        </p>
      </div>

      <!-- Card 5: Always Learning -->
      <div class="col-span-5 md:col-span-3 rounded-3xl p-8 min-h-[240px] flex flex-col justify-between overflow-hidden relative" style="background: var(--surface-1); box-shadow: var(--shadow-soft);">
        <span class="self-start text-xs font-semibold tracking-widest uppercase px-4 py-1.5 rounded-full" style="background: var(--surface-2); color: var(--text-secondary);">Always Learning</span>
        <div class="z-10 relative">
          <p class="text-xl font-medium" style="color: var(--text-tertiary);">Expert</p>
          <p class="text-3xl font-bold" style="color: var(--text-primary);">Golang & Flutter</p>
        </div>
        <div class="absolute right-0 bottom-0 w-44 pointer-events-none">
          <img src="/storage/assets/images/altamis-exploring-image.png" alt="Exploring" class="w-full object-contain" />
        </div>
      </div>

    </div>

  </div>
</section>

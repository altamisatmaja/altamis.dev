<script>
  const cards = [
    {
      num: "01",
      title: "Discover",
      desc: "We start by understanding your goals, target audience, and challenges. This phase ensures we craft solutions that align with your vision and business objectives.",
      color: "#f1f5f9",
      img: "/storage/assets/images/altamis-hero-Image.png",
    },
    {
      num: "02",
      title: "Design & Build",
      desc: "Our team designs intuitive interfaces and develops high-performance digital products. Every step focuses on usability, aesthetics, and scalability.",
      color: "#007AFF",
      img: "/storage/assets/images/altamis-exploring-image.png",
    },
    {
      num: "03",
      title: "Launch & Grow",
      desc: "After rigorous testing, we launch your product and provide ongoing support. We monitor performance and optimize strategies to help your brand grow.",
      color: "#f1f5f9",
      img: "/storage/assets/images/altamis-full-stack-imge.png",
    },
  ];

  const rotations = [2, -2, 2];
</script>

<section id="works" class="px-6 " style="background: var(--page-bg); padding-top: 100px; padding-bottom: 100px;">

  <!-- Header -->
  <div class="max-w-3xl mx-auto text-center mb-16">
    <p class="text-xs font-semibold tracking-widest uppercase mb-4" style="color: var(--text-tertiary);">How It Works</p>
    <h2 class="text-5xl md:text-6xl font-bold tracking-tight mb-4" style="color: var(--text-primary); letter-spacing: -0.03em;">
      We bring <span class="px-3 py-1 rounded-2xl inline-block" style="background: var(--accent-strong); color: var(--text-contrast);">ideas</span> to life
    </h2>
    <p class="text-lg" style="color: var(--text-secondary);">A simple, transparent process to turn your vision into impactful digital products.</p>
  </div>

  <!-- Cards -->
  <div class="max-w-3xl mx-auto flex flex-col gap-5">
    {#each cards as card, i}
      <div style="transform: rotate({rotations[i]}deg); transform-origin: center center;">
        <div class="rounded-3xl p-8 md:p-10" style="background: {card.num === '02' ? 'var(--accent-strong)' : 'var(--surface-2)'}; box-shadow: var(--shadow-soft);">

          <p class="text-xs font-bold tracking-widest uppercase mb-2" style="color: {card.num === '02' ? 'rgba(255,255,255,0.72)' : 'var(--text-secondary)'};">{card.num}</p>
          <p class="text-2xl md:text-3xl font-black mb-8" style="color: {card.num === '02' ? 'var(--text-contrast)' : 'var(--text-primary)'};">{card.title}</p>

          <div class="flex items-end gap-6">
            <p class="flex-1 text-base md:text-lg leading-relaxed font-medium" style="color: {card.num === '02' ? 'rgba(255,255,255,0.85)' : 'var(--text-secondary)'};">
              {card.desc}
            </p>
            <div class="w-28 h-28 rounded-2xl overflow-hidden shrink-0" style="background: {card.num === '02' ? 'rgba(255,255,255,0.16)' : 'var(--surface-1)'};">
              <img src={card.img} alt={card.title} class="w-full h-full object-cover" loading="lazy" />
            </div>
          </div>

        </div>
      </div>
    {/each}
  </div>

</section>

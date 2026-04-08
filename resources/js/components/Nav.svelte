<script>
  import ThemeSwitch from './ThemeSwitch.svelte';
  import { onMount } from 'svelte';
  export let theme = 'light';
  export let toggleTheme = () => {};

  let active = 'home';
  let hoveredIndex = -1;
  let dockItems = [];
  let dockEffects = [];
  let dockList;
  let isCompact = false;

  function getDockMetrics() {
    return isCompact
      ? {
          effectRadius: 72,
          maxScale: 1.18,
          maxLift: 10,
          maxMargin: 4,
          itemSize: 44,
          paddingIdle: 12,
          paddingActive: 16,
        }
      : {
          effectRadius: 110,
          maxScale: 1.72,
          maxLift: 28,
          maxMargin: 12,
          itemSize: 56,
          paddingIdle: 20,
          paddingActive: 28,
        };
  }

  function syncViewport() {
    isCompact = window.innerWidth < 640;
    resetDockEffects();
  }

  const items = [
    {
      id: 'home',
      label: 'Home',
      href: '#home',
      icon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
        <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
        <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
      </svg>`,
    },
      {
      id: 'about',
      label: 'About',
      href: '#about',
      icon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
        <path fill-rule="evenodd" d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 003 3h15a3 3 0 01-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125zM12 9.75a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5H12zm-.75-2.25a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5H12a.75.75 0 01-.75-.75zM6 12.75a.75.75 0 000 1.5h7.5a.75.75 0 000-1.5H6zm-.75 3.75a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5H6a.75.75 0 01-.75-.75zM6 9.75a.75.75 0 000 1.5h3a.75.75 0 000-1.5H6z" clip-rule="evenodd" />
        <path d="M18.75 6.75h1.875c1.035 0 1.875.84 1.875 1.875v15.75c0 1.035-.84 1.875-1.875 1.875h-9.75c-1.036 0-1.875-.84-1.875-1.875v-1.5c0-1.036.84-1.875 1.875-1.875h6c1.035 0 1.875-.84 1.875-1.875V6.75z" />
      </svg>`,
    },
    {
      id: 'works',
      label: 'Works',
      href: '#works',
      icon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
        <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zM9.75 14.25a.75.75 0 000 1.5H15a.75.75 0 000-1.5H9.75z" clip-rule="evenodd" />
        <path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" />
      </svg>`,
    },
  
    {
      id: 'contact',
      label: 'Say Hi',
      href: 'mailto:hello@altamis.dev',
      icon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
        <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
        <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
      </svg>`,
    },
  ];

  function createBaseEffect() {
    return {
      scale: 1,
      translateY: 0,
      marginX: 0,
      zIndex: 1,
    };
  }

  function clamp(value, min, max) {
    return Math.min(Math.max(value, min), max);
  }

  function resetDockEffects() {
    hoveredIndex = -1;
    dockEffects = items.map(() => createBaseEffect());
  }

  function updateDockEffects(clientX) {
    if (!dockList) return;

    const { effectRadius, maxScale, maxLift, maxMargin } = getDockMetrics();

    const dockRect = dockList.getBoundingClientRect();
    const pointerX = clientX - dockRect.left;

    let nextHoveredIndex = -1;
    let strongestInfluence = 0;

    dockEffects = items.map((_, index) => {
      const item = dockItems[index];
      if (!item) return createBaseEffect();

      const centerX = item.offsetLeft + item.offsetWidth / 2;
      const distance = Math.abs(pointerX - centerX);
      const influence = clamp(1 - distance / effectRadius, 0, 1);
      const eased = Math.sin((influence * Math.PI) / 2);

      if (eased > strongestInfluence) {
        strongestInfluence = eased;
        nextHoveredIndex = index;
      }

      return {
        scale: 1 + eased * (maxScale - 1),
        translateY: -eased * maxLift,
        marginX: eased * maxMargin,
        zIndex: 1 + Math.round(eased * 100),
      };
    });

    hoveredIndex = strongestInfluence > (isCompact ? 0.22 : 0.14) ? nextHoveredIndex : -1;
  }

  function getTooltipTranslateY(effect) {
    const { itemSize } = getDockMetrics();
    const scaledHeightLift = itemSize * (effect.scale - 1);
    return effect.translateY - scaledHeightLift - 6;
  }

  function handleDockPointerEnter(event) {
    updateDockEffects(event.clientX);
  }

  function handleDockPointerMove(event) {
    updateDockEffects(event.clientX);
  }

  function handleDockPointerLeave() {
    resetDockEffects();
  }

  const sectionIds = ['home', 'works', 'about'];

  onMount(() => {
    syncViewport();
    resetDockEffects();
    window.addEventListener('resize', syncViewport);

    const observer = new IntersectionObserver(
      (entries) => {
        for (const entry of entries) {
          if (entry.isIntersecting) active = entry.target.id;
        }
      },
      { threshold: 0.4 }
    );
    sectionIds.forEach(id => {
      const el = document.getElementById(id);
      if (el) observer.observe(el);
    });
    return () => {
      observer.disconnect();
      window.removeEventListener('resize', syncViewport);
    };
  });
</script>

<nav class="fixed bottom-4 left-1/2 -translate-x-1/2 z-50 sm:bottom-8">
  <div class="flex items-end gap-2 sm:gap-4">
    <div class="relative overflow-visible">
      <div
        aria-hidden="true"
        class="pointer-events-none absolute inset-0 rounded-[26px] backdrop-blur-xl shadow-2xl"
        style="background: {theme === 'light'
          ? 'linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(230, 233, 238, 0.92))'
          : 'linear-gradient(180deg, rgba(38, 45, 56, 0.96), rgba(22, 27, 34, 0.96))'}; box-shadow: {theme === 'light'
          ? 'inset 0 1px 0 rgba(255, 255, 255, 0.9), inset 0 -1px 0 rgba(170, 177, 188, 0.28), 0 12px 30px rgba(134, 142, 155, 0.28)'
          : 'inset 0 1px 0 rgba(255, 255, 255, 0.04), inset 0 -1px 0 rgba(0, 0, 0, 0.32), 0 12px 30px rgba(0, 0, 0, 0.32)'}; border: 0; transition: box-shadow 220ms ease, background 220ms ease;"
      ></div>

      <div
        bind:this={dockList}
        class="relative flex items-end overflow-visible py-3 sm:py-4"
        role="presentation"
        style="min-height: {isCompact ? 'var(--mobile-dock-shell-height)' : 'auto'}; gap: {isCompact ? 6 : 12}px; padding-left: {hoveredIndex !== -1 ? getDockMetrics().paddingActive : getDockMetrics().paddingIdle}px; padding-right: {hoveredIndex !== -1 ? getDockMetrics().paddingActive : getDockMetrics().paddingIdle}px; transition: padding 0.2s cubic-bezier(0.34,1.56,0.64,1);"
        on:pointerenter={handleDockPointerEnter}
        on:pointermove={handleDockPointerMove}
        on:pointerleave={handleDockPointerLeave}
      >
        {#each items as item, i}
          {@const effect = dockEffects[i] ?? createBaseEffect()}
          {@const isActive = active === item.id}

          <div
            bind:this={dockItems[i]}
            class="relative flex flex-col items-center"
            role="presentation"
            style="margin-left: {effect.marginX}px; margin-right: {effect.marginX}px; z-index: {effect.zIndex}; will-change: margin; transition: margin 0.22s cubic-bezier(0.34,1.56,0.64,1);"
          >

            <!-- Tooltip -->
            {#if hoveredIndex === i && !isCompact}
              <div
                class="nav-tooltip pointer-events-none absolute -top-12 left-1/2 text-sm font-medium px-3 py-1.5 rounded-[18px] whitespace-nowrap shadow-xl"
                style="background: var(--nav-item); color: var(--nav-tooltip-text); border: 1px solid var(--line-soft); transform: translateX(-50%) translateY({getTooltipTranslateY(effect)}px);"
              >
                {item.label}
              </div>
            {/if}

            <div class="flex flex-col items-center">
              <!-- Icon button -->
              <a
                href={item.href}
                aria-label={item.label}
                on:click={() => { if (!item.href.startsWith('mailto')) active = item.id; }}
                class="relative flex items-center justify-center rounded-[16px] sm:rounded-[18px] transition-colors duration-150
                  {isActive ? 'text-white' : 'hover:text-white'}"
                style="width: {getDockMetrics().itemSize}px; height: {getDockMetrics().itemSize}px; background: {isActive ? 'var(--accent-strong)' : 'var(--nav-item)'}; color: {isActive ? 'var(--text-contrast)' : 'var(--nav-text)'}; transform: translateY({effect.translateY}px) scale({effect.scale}); transform-origin: center bottom; will-change: transform; transition: transform 0.22s cubic-bezier(0.22,1,0.36,1), background-color 0.15s ease, color 0.15s ease;"
              >
                <span class="nav-icon flex items-center justify-center">
                  {@html item.icon}
                </span>
              </a>

              <!-- Active dot -->
              <div
                class="mt-1.5 w-1 h-1 rounded-full transition-all duration-300 {isActive ? 'opacity-80' : 'opacity-0'}"
                style="background: {theme === 'light' ? 'var(--text-primary)' : 'var(--text-contrast)'};"
              ></div>
            </div>
          </div>
        {/each}
      </div>
    </div>

    <div class="shrink-0">
      <ThemeSwitch {theme} {toggleTheme} />
    </div>
  </div>
</nav>

<style>
  .nav-tooltip::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: -7px;
    width: 12px;
    height: 12px;
    background: inherit;
    border-right: 1px solid var(--line-soft);
    border-bottom: 1px solid var(--line-soft);
    transform: translateX(-50%) rotate(45deg);
  }

  .nav-tooltip {
    will-change: transform, opacity;
    transition: transform 0.18s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.18s ease;
  }

  .nav-icon :global(svg) {
    display: block;
  }
</style>

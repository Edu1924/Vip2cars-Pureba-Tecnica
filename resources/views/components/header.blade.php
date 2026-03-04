{{-- resources/views/components/header.blade.php --}}
<style>
.vip-header{position:fixed;top:0;left:0;right:0;z-index:1000;background:rgba(8,8,8,.88);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);border-bottom:1px solid rgba(208,21,28,.15);transition:all .35s ease}
.vip-header.scrolled{background:rgba(8,8,8,.97);border-color:rgba(208,21,28,.35);box-shadow:0 4px 30px rgba(208,21,28,.08)}
.header-inner{max-width:1280px;margin:0 auto;padding:0 2rem;height:70px;display:flex;align-items:center;justify-content:space-between;gap:2rem}

.header-logo{display:flex;align-items:center;gap:.7rem;flex-shrink:0}
.logo-emblem{width:40px;height:40px;background:var(--red);clip-path:polygon(50% 0%,100% 25%,100% 75%,50% 100%,0% 75%,0% 25%);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.logo-emblem img{width:22px;height:22px;object-fit:contain}
.logo-wordmark{display:flex;flex-direction:column;line-height:1}
.logo-main{font-family:var(--font-d);font-size:1.5rem;font-weight:700;letter-spacing:.15em;color:var(--white)}
.logo-main em{color:var(--red);font-style:normal}
.logo-sub{font-size:.6rem;font-weight:500;letter-spacing:.25em;color:var(--muted);text-transform:uppercase;margin-top:1px}

.header-nav{display:flex;align-items:center;gap:0;list-style:none}
.header-nav a{font-family:var(--font-d);font-size:.82rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);padding:.5rem .9rem;position:relative;transition:color .2s}
.header-nav a::after{content:'';position:absolute;bottom:0;left:50%;right:50%;height:2px;background:var(--red);transition:left .25s,right .25s}
.header-nav a:hover{color:var(--white)}
.header-nav a:hover::after,.header-nav a.active::after{left:10%;right:10%}
.header-nav a.active{color:var(--white)}

.header-cta{font-family:var(--font-d);font-size:.8rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--white);background:var(--red);padding:.5rem 1.3rem;border-radius:2px;border:1px solid var(--red);transition:background .2s,box-shadow .2s,transform .15s;white-space:nowrap;flex-shrink:0}
.header-cta:hover{background:var(--red-dark);box-shadow:0 0 20px var(--red-glow);transform:translateY(-1px)}

.hamburger{display:none;flex-direction:column;gap:5px;cursor:pointer;padding:.4rem;background:none;border:none}
.hamburger span{display:block;width:22px;height:2px;background:var(--red);border-radius:2px;transition:all .3s}
.hamburger.open span:nth-child(1){transform:translateY(7px) rotate(45deg)}
.hamburger.open span:nth-child(2){opacity:0;transform:scaleX(0)}
.hamburger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}

.mobile-nav{display:none;position:absolute;top:70px;left:0;right:0;background:rgba(8,8,8,.99);border-bottom:1px solid var(--border-hi);padding:1rem 2rem 1.5rem;flex-direction:column;gap:0}
.mobile-nav.open{display:flex}
.mobile-nav a{font-family:var(--font-d);font-size:.95rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);padding:.7rem 0;border-bottom:1px solid var(--border);transition:color .2s,padding-left .2s}
.mobile-nav a:hover{color:var(--red);padding-left:6px}
.mobile-nav a:last-child{border-bottom:none}
.m-cta{margin-top:.75rem;text-align:center;color:var(--white)!important;background:var(--red);padding:.7rem;border-radius:2px;padding-left:0!important}

@media(max-width:860px){.header-nav,.header-cta{display:none}.hamburger{display:flex}}
</style>

<header class="vip-header" id="vipHeader">
    <div class="header-inner">
        <a href="{{ url('/') }}" class="header-logo">
            <div class="logo-emblem">
                <img src="{{ asset('https://www.vip2cars.com/img/logo/vip2car_logo.svg') }}" alt="Logo">
            </div>
            <div class="logo-wordmark">
                <span class="logo-main">VIP<em>2</em>CARS</span>
                <span class="logo-sub">EL TRATO VIP PARA TU AUTO</span>
            </div>
        </a>

        <nav>
            <ul class="header-nav">
                <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a></li>
                <li><a href="{{ url('/registro-vehículos') }}">Registro Vehículos</a></li>                                
            </ul>
        </nav>

        <a href="{{ url('/registro-vehículos') }}" class="header-cta">Registrar Auto</a>

        <button class="hamburger" id="hamburger" aria-label="Menú">
            <span></span><span></span><span></span>
        </button>
    </div>

    <nav class="mobile-nav" id="mobileNav">
        <a href="{{ url('/') }}">Inicio</a>
        <a href="{{ url('/registro-vehículos') }}">Registro de Vehículos</a>        
        <a href="{{ url('/registro-vehículos') }}" class="m-cta">Registrar Auto →</a>
    </nav>
</header>

<div style="height:70px"></div>

<script>
(function(){
    const h = document.getElementById('vipHeader');
    const b = document.getElementById('hamburger');
    const m = document.getElementById('mobileNav');
    window.addEventListener('scroll', () => h.classList.toggle('scrolled', scrollY > 30), { passive: true });
    b.addEventListener('click', () => { b.classList.toggle('open'); m.classList.toggle('open'); });
})();
</script>
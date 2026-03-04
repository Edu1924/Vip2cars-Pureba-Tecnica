{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'VIP2CARS – Portal de Gestión')

@push('styles')
<style>
/* ════════════════════════════
   HERO
════════════════════════════ */
.hero{position:relative;min-height:calc(100vh - 70px);display:flex;align-items:center;justify-content:center;padding:5rem 2rem;overflow:hidden}
.hero-bg{position:absolute;inset:0;background:var(--black)}
.hero-stripes{position:absolute;inset:0;overflow:hidden;pointer-events:none}
.hero-stripes::before{content:'';position:absolute;top:-20%;right:-10%;width:55%;height:140%;background:linear-gradient(160deg,transparent 30%,rgba(208,21,28,.04) 30%,rgba(208,21,28,.04) 32%,transparent 32%,transparent 42%,rgba(208,21,28,.03) 42%,rgba(208,21,28,.03) 44%,transparent 44%);transform:skewX(-15deg)}
.hero-stripes::after{content:'';position:absolute;bottom:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,rgba(208,21,28,.4),transparent)}
.hero-glow{position:absolute;top:30%;right:15%;width:500px;height:500px;background:radial-gradient(ellipse,rgba(208,21,28,.1) 0%,transparent 65%);pointer-events:none}
.hero-glow-2{position:absolute;bottom:10%;left:5%;width:300px;height:300px;background:radial-gradient(ellipse,rgba(208,21,28,.06) 0%,transparent 70%);pointer-events:none}
.hero-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.018) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.018) 1px,transparent 1px);background-size:80px 80px;mask-image:radial-gradient(ellipse 75% 70% at 60% 40%,black 20%,transparent 100%);-webkit-mask-image:radial-gradient(ellipse 75% 70% at 60% 40%,black 20%,transparent 100%)}

.hero-layout{position:relative;z-index:2;max-width:1100px;width:100%;display:grid;grid-template-columns:1fr 420px;align-items:center;gap:4rem}

.hero-badge{display:inline-flex;align-items:center;gap:.5rem;font-family:var(--font-d);font-size:.7rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--red);margin-bottom:1.5rem;animation:fadeUp .5s ease both}
.badge-dot{width:6px;height:6px;border-radius:50%;background:var(--red);box-shadow:0 0 8px var(--red);animation:pulse 2s infinite}
@keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(.8)}}

.hero-title{font-family:var(--font-d);font-size:clamp(3.2rem,6vw,5.2rem);font-weight:700;line-height:.92;letter-spacing:-.01em;margin-bottom:1.5rem;animation:fadeUp .5s ease .08s both}
.hero-title .line-white{color:var(--white);display:block}
.hero-title .line-red{color:var(--red);display:block}
.hero-title .line-outline{color:transparent;display:block;-webkit-text-stroke:1.5px rgba(255,255,255,.2);letter-spacing:.05em}

.hero-sub{font-size:.95rem;font-weight:300;color:var(--muted);line-height:1.8;max-width:440px;margin-bottom:2.5rem;animation:fadeUp .5s ease .16s both}

.hero-actions{display:flex;gap:1rem;flex-wrap:wrap;animation:fadeUp .5s ease .22s both}
.btn-primary{font-family:var(--font-d);font-size:.82rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--white);background:var(--red);padding:.75rem 1.8rem;border-radius:2px;transition:background .2s,box-shadow .2s,transform .15s}
.btn-primary:hover{background:var(--red-dark);transform:translateY(-2px);box-shadow:0 8px 30px rgba(208,21,28,.4)}
.btn-ghost{font-family:var(--font-d);font-size:.82rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--text);padding:.75rem 1.8rem;border-radius:2px;border:1px solid var(--border);transition:border-color .2s,color .2s}
.btn-ghost:hover{border-color:var(--red);color:var(--red)}

/* Dashboard card decorativo */
.hero-right{position:relative;animation:fadeUp .5s ease .3s both}
.hero-card-deco{background:var(--mid);border:1px solid var(--border);border-radius:6px;padding:1.75rem;position:relative;overflow:hidden}
.hero-card-deco::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--red),rgba(208,21,28,.2))}
.deco-label{font-family:var(--font-d);font-size:.7rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--red);margin-bottom:1.2rem}
.deco-stat-row{display:flex;justify-content:space-between;border-bottom:1px solid var(--border);padding:.65rem 0}
.deco-stat-row:last-of-type{border-bottom:none}
.deco-stat-name{font-size:.82rem;color:var(--muted)}
.deco-stat-val{font-family:var(--font-d);font-size:.95rem;font-weight:600;color:var(--white);letter-spacing:.05em}
.deco-stat-val.hi{color:var(--red)}
.deco-bottom{margin-top:1.2rem;padding-top:1.2rem;border-top:1px solid var(--border);display:flex;justify-content:space-between;align-items:center}
.deco-tag{font-family:var(--font-d);font-size:.68rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:var(--white);background:var(--red);padding:.2rem .6rem;border-radius:2px}
.deco-score{font-family:var(--font-d);font-size:1.4rem;font-weight:700;color:var(--white)}
.deco-score span{font-size:.75rem;color:var(--muted);font-family:var(--font-b);font-weight:400;margin-left:2px}
.hero-card-shadow{position:absolute;top:12px;left:-10px;right:10px;bottom:-10px;background:var(--surface);border:1px solid var(--border);border-radius:6px;z-index:-1}
.hero-card-shadow-2{position:absolute;top:22px;left:-20px;right:20px;bottom:-18px;background:var(--dark);border:1px solid var(--border);border-radius:6px;z-index:-2;opacity:.5}

@media(max-width:900px){.hero-layout{grid-template-columns:1fr}.hero-right{display:none}}

/* ════════════════════════════
   CARDS
════════════════════════════ */
.cards-section{padding:0 2rem 6rem;position:relative}
.section-sep{max-width:1100px;margin:0 auto 3rem;display:flex;align-items:center;gap:1rem}
.sep-line{flex:1;height:1px;background:var(--border)}
.sep-dot{width:5px;height:5px;border-radius:50%;background:var(--red);flex-shrink:0}
.sep-label{font-family:var(--font-d);font-size:.68rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--muted);white-space:nowrap}

.cards-wrapper{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:repeat(2,1fr);gap:1.5rem}

.portal-card{position:relative;background:var(--mid);border:1px solid var(--border);border-radius:6px;padding:3rem 2.75rem;display:flex;flex-direction:column;gap:.9rem;overflow:hidden;transition:transform .3s ease,border-color .3s,box-shadow .3s;color:inherit;cursor:pointer}
.portal-card::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(208,21,28,.05) 0%,transparent 55%);opacity:0;transition:opacity .35s}
.portal-card:hover{transform:translateY(-5px);border-color:rgba(208,21,28,.45);box-shadow:0 20px 60px rgba(0,0,0,.6),0 0 0 1px rgba(208,21,28,.1),0 0 40px rgba(208,21,28,.06)}
.portal-card:hover::before{opacity:1}

.card-accent{position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--red) 0%,rgba(208,21,28,.2) 60%,transparent 100%);transform:scaleX(0);transform-origin:left;transition:transform .4s ease}
.portal-card:hover .card-accent{transform:scaleX(1)}

.card-number{font-family:var(--font-d);font-size:4rem;font-weight:700;line-height:1;color:rgba(208,21,28,.1);position:absolute;top:1.5rem;right:2rem;letter-spacing:.05em;user-select:none;transition:color .35s}
.portal-card:hover .card-number{color:rgba(208,21,28,.2)}

.card-icon-wrap{width:52px;height:52px;border-radius:4px;background:var(--red-dim);border:1px solid rgba(208,21,28,.2);display:flex;align-items:center;justify-content:center;transition:background .3s,border-color .3s,box-shadow .3s;flex-shrink:0}
.portal-card:hover .card-icon-wrap{background:rgba(208,21,28,.15);border-color:rgba(208,21,28,.4);box-shadow:0 0 20px rgba(208,21,28,.2)}
.card-icon-wrap svg{color:var(--red);width:24px;height:24px}

.card-eyebrow{font-family:var(--font-d);font-size:.68rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--red)}
.card-title{font-family:var(--font-d);font-size:1.9rem;font-weight:700;letter-spacing:.02em;color:var(--white);line-height:1.05}
.card-desc{font-size:.88rem;color:var(--muted);line-height:1.75;flex-grow:1}

.card-divider{height:1px;background:var(--border);transition:background .3s}
.portal-card:hover .card-divider{background:rgba(208,21,28,.2)}

.card-cta{display:inline-flex;align-items:center;gap:.55rem;font-family:var(--font-d);font-size:.8rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--red);transition:gap .25s}
.portal-card:hover .card-cta{gap:.9rem}
.cta-arrow{width:28px;height:28px;border-radius:50%;border:1px solid rgba(208,21,28,.3);display:flex;align-items:center;justify-content:center;transition:background .25s,border-color .25s,transform .25s}
.portal-card:hover .cta-arrow{background:var(--red);border-color:var(--red);transform:rotate(-45deg)}
.cta-arrow svg{width:12px;height:12px;color:var(--red);transition:color .25s}
.portal-card:hover .cta-arrow svg{color:var(--white)}

/* ════════════════════════════
   STATS
════════════════════════════ */
.stats-section{padding:0 2rem 6rem}
.stats-inner{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:repeat(3,1fr);border:1px solid var(--border);border-radius:6px;overflow:hidden}
.stat-cell{padding:2.25rem 2rem;text-align:center;border-right:1px solid var(--border);background:var(--mid);position:relative;overflow:hidden;transition:background .25s}
.stat-cell:last-child{border-right:none}
.stat-cell::before{content:'';position:absolute;top:0;left:50%;width:40%;height:2px;background:var(--red);transform:translateX(-50%) scaleX(0);transition:transform .35s}
.stat-cell:hover::before{transform:translateX(-50%) scaleX(1)}
.stat-cell:hover{background:var(--surface)}
.stat-num{font-family:var(--font-d);font-size:2.6rem;font-weight:700;color:var(--white);display:block;line-height:1}
.stat-num em{color:var(--red);font-style:normal}
.stat-label{font-size:.75rem;font-weight:500;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);margin-top:.4rem;display:block}

@media(max-width:680px){.cards-wrapper{grid-template-columns:1fr}}
@media(max-width:600px){
  .stats-inner{grid-template-columns:1fr}
  .stat-cell{border-right:none;border-bottom:1px solid var(--border)}
  .stat-cell:last-child{border-bottom:none}
}

@keyframes fadeUp{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:translateY(0)}}
</style>
@endpush

@section('content')

{{-- ── HERO ── --}}
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-stripes"></div>
    <div class="hero-glow"></div>
    <div class="hero-glow-2"></div>
    <div class="hero-grid"></div>

    <div class="hero-layout">
        <div class="hero-left">
            <div class="hero-badge">
                <span class="badge-dot"></span>
                Portal de Gestión VIP2CARS
            </div>
            <h1 class="hero-title">
                <span class="line-white">BIENVENIDO</span>
                <span class="line-outline">AL SISTEMA</span>
                <span class="line-red">VIP2CARS</span>
            </h1>
            <p class="hero-sub">
                Gestiona el registro de vehículos y participa en nuestras encuestas anónimas. 
                Tecnología de primer nivel para el taller líder en autos de gama alta de Lima.
            </p>
            <div class="hero-actions">
                <a href="{{ url('/registro-vehículos') }}" class="btn-primary">Registrar Vehículo</a>                
            </div>
        </div>

        <div class="hero-right">
            <div class="hero-card-shadow-2"></div>
            <div class="hero-card-shadow"></div>
            <div class="hero-card-deco">
                <p class="deco-label">● Sistema activo</p>
                <div class="deco-stat-row">
                    <span class="deco-stat-name">Vehículos registrados</span>
                    {{-- Contar vehiculos registrados --}}
                    <span class="deco-stat-val hi">{{ number_format($vehiculosRegistrados) }}</span>
                </div>                
                <div class="deco-stat-row">
                    <span class="deco-stat-name">Satisfacción promedio</span>
                    <span class="deco-stat-val hi">98%</span>
                </div>
                <div class="deco-stat-row">
                    <span class="deco-stat-name">Tiempo de respuesta</span>
                    <span class="deco-stat-val">24h</span>
                </div>
                <div class="deco-bottom">
                    <span class="deco-tag">PUNTUACION DE NUESTROS CLIENTES</span>
                    <span class="deco-score">5.0<span>/ 5.0</span></span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
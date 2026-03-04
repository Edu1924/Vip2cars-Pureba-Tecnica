{{-- resources/views/components/footer.blade.php --}}
<style>
.vip-footer { background: var(--dark); border-top: 1px solid var(--border); margin-top: 2rem; }

.footer-top-band {
    height: 2px;
    background: linear-gradient(90deg, transparent 0%, var(--red) 40%, var(--red-dark) 60%, transparent 100%);
    opacity: .6;
}

.footer-body {
    max-width: 1280px; margin: 0 auto;
    padding: 1.75rem 2rem;
    display: flex; align-items: center;
    justify-content: space-between;
    gap: 2rem; flex-wrap: wrap;
    border-bottom: 1px solid var(--border);
}

/* ── Logo ── */
.fbrand { display: flex; align-items: center; gap: .65rem; flex-shrink: 0; }
.fbrand-emblem {
    width: 30px; height: 30px; background: var(--red);
    clip-path: polygon(50% 0%,100% 25%,100% 75%,50% 100%,0% 75%,0% 25%);
    display: flex; align-items: center; justify-content: center;
}
.fbrand-emblem img { width: 18px; height: 18px; object-fit: contain; }
.fbrand-name {
    font-family: var(--font-d); font-size: 1.1rem; font-weight: 700;
    letter-spacing: .13em; color: var(--white); line-height: 1;
}
.fbrand-name em { color: var(--red); font-style: normal; }
.fbrand-sub { font-size: .62rem; color: var(--muted); letter-spacing: .1em; margin-top: 2px; }

/* ── Nav ── */
.footer-nav { display: flex; align-items: center; flex-wrap: wrap; }
.footer-nav a {
    font-family: var(--font-d); font-size: .7rem; font-weight: 600;
    letter-spacing: .1em; text-transform: uppercase;
    color: var(--muted); padding: .25rem .7rem;
    border-right: 1px solid var(--border);
    white-space: nowrap; transition: color .2s;
}
.footer-nav a:last-child { border-right: none; }
.footer-nav a:hover { color: var(--red); }

/* ── Right cluster ── */
.footer-right { display: flex; align-items: center; gap: .75rem; flex-shrink: 0; }

.f-social { display: flex; gap: .35rem; }
.f-social a {
    width: 28px; height: 28px; border-radius: 3px;
    border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    color: var(--muted); transition: all .18s;
}
.f-social a:hover { border-color: var(--red); color: var(--red); background: var(--red-dim); }
.f-social svg { width: 11px; height: 11px; }

.footer-phone {
    display: inline-flex; align-items: center; gap: .4rem;
    font-size: .75rem; color: var(--muted);
    background: var(--surface); border: 1px solid var(--border);
    padding: .3rem .75rem; border-radius: 3px;
    transition: border-color .2s, color .2s; white-space: nowrap;
}
.footer-phone:hover { border-color: rgba(208,21,28,.3); color: var(--text); }
.footer-phone svg { width: 11px; height: 11px; color: var(--red); flex-shrink: 0; }

/* ── Bottom bar ── */
.footer-bottom {
    max-width: 1280px; margin: 0 auto;
    padding: .8rem 2rem;
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: .5rem;
}
.footer-bottom p { font-size: .7rem; color: #3e3e3e; letter-spacing: .04em; }
.footer-bottom p span { color: var(--red); }
.f-bottom-links { display: flex; gap: 1rem; list-style: none; }
.f-bottom-links a { font-size: .68rem; color: #3e3e3e; transition: color .2s; }
.f-bottom-links a:hover { color: var(--muted); }

@media(max-width: 760px) {
    .footer-body { flex-direction: column; align-items: flex-start; gap: 1.25rem; }
    .footer-phone { display: none; }
}
@media(max-width: 480px) {
    .footer-nav a { font-size: .65rem; padding: .25rem .5rem; }
}
</style>

<footer class="vip-footer">
    <div class="footer-top-band"></div>

    <div class="footer-body">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="fbrand">
            <div class="fbrand-emblem">
                <img src="{{ asset('https://www.vip2cars.com/img/logo/vip2car_logo.svg') }}" alt="Logo">
            </div>
            <div>
                <div class="fbrand-name">VIP<em>2</em>CARS</div>
                <div class="fbrand-sub">EL TRATO VIP PARA TU AUTO</div>
            </div>
        </a>

        {{-- Nav --}}
        <nav class="footer-nav">
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ url('/registro-vehiculos') }}">Registro</a>
            <a href="https://github.com/Edu1924" target="_blank" rel="noopener" aria-label="Github">Github</a>
        </nav>

        {{-- Social + teléfono --}}
        <div class="footer-right">
            <div class="f-social">
                <a href="https://facebook.com/vip2cars" target="_blank" rel="noopener" aria-label="Facebook">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </a>
                <a href="https://instagram.com/vip2cars" target="_blank" rel="noopener" aria-label="Instagram">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                </a>
                <a href="https://wa.me/51929642450" target="_blank" rel="noopener" aria-label="WhatsApp">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12 0C5.373 0 0 5.373 0 12c0 2.136.558 4.14 1.535 5.877L.057 23.882l6.126-1.607A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0z"/></svg>
                </a>
                <a href="https://tiktok.com/@vip2cars" target="_blank" rel="noopener" aria-label="TikTok">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.34 6.34 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.94a8.2 8.2 0 0 0 4.8 1.54V7.03a4.85 4.85 0 0 1-1.03-.34z"/></svg>
                </a>
            </div>

            <a href="tel:929642450" class="footer-phone">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.99 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.9 2.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                929642450
            </a>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© {{ date('Y') }} <span>VIP2CARS</span>. Todos los derechos reservados.</p>
        <ul class="f-bottom-links">
            <li><a href="#">Términos</a></li>
            <li><a href="#">Privacidad</a></li>
            <li><a href="#">Reclamaciones</a></li>
        </ul>
    </div>
</footer>
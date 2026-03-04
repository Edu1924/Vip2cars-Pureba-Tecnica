{{-- resources/views/registro-vehiculos.blade.php --}}
@extends('layouts.app')

@section('title', 'VIP2CARS – Registro de Vehículos')

@push('styles')
<style>
/* ════════════════════════════════════════
   PAGE HEADER
════════════════════════════════════════ */
.page-hero {
    position: relative;
    padding: 3.5rem 2rem 3rem;
    overflow: hidden;
}
.page-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 60% 80% at 100% 50%, rgba(208,21,28,.07) 0%, transparent 60%),
        var(--black);
}
.page-hero::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(208,21,28,.3), transparent);
}
.page-hero-inner {
    position: relative;
    z-index: 1;
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 1.5rem;
    flex-wrap: wrap;
}
.page-breadcrumb {
    display: flex;
    align-items: center;
    gap: .5rem;
    font-family: var(--font-d);
    font-size: .68rem;
    font-weight: 600;
    letter-spacing: .15em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: .75rem;
}
.page-breadcrumb a { color: var(--red); transition: opacity .2s; }
.page-breadcrumb a:hover { opacity: .7; }
.page-breadcrumb span { opacity: .4; }
.page-title {
    font-family: var(--font-d);
    font-size: clamp(1.8rem, 3.5vw, 2.6rem);
    font-weight: 700;
    letter-spacing: .03em;
    color: var(--white);
    line-height: 1;
}
.page-title em { color: var(--red); font-style: normal; }
.page-subtitle {
    font-size: .88rem;
    color: var(--muted);
    margin-top: .5rem;
}
.page-badge {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    font-family: var(--font-d);
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .15em;
    text-transform: uppercase;
    color: var(--red);
    background: rgba(208,21,28,.08);
    border: 1px solid rgba(208,21,28,.2);
    padding: .4rem .9rem;
    border-radius: 2px;
    white-space: nowrap;
}
.page-badge::before {
    content: '';
    width: 6px; height: 6px;
    border-radius: 50%;
    background: var(--red);
    box-shadow: 0 0 6px var(--red);
    animation: pulse 2s infinite;
}
@keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(.8)} }

/* ════════════════════════════════════════
   MAIN LAYOUT
════════════════════════════════════════ */
.vehicles-layout {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2.5rem 2rem 6rem;
    display: flex;
    flex-direction: column;
    gap: 3rem;
}

/* ════════════════════════════════════════
   FORM CARD
════════════════════════════════════════ */
.form-card {
    background: var(--mid);
    border: 1px solid var(--border);
    border-radius: 8px;
    overflow: hidden;
}
.form-card-header {
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    background: rgba(208,21,28,.03);
    position: relative;
}
.form-card-header::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--red), rgba(208,21,28,.2), transparent);
}
.form-card-title {
    display: flex;
    align-items: center;
    gap: .75rem;
}
.form-card-icon {
    width: 36px; height: 36px;
    background: rgba(208,21,28,.1);
    border: 1px solid rgba(208,21,28,.2);
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.form-card-icon svg { width: 18px; height: 18px; color: var(--red); }
.form-card-title h2 {
    font-family: var(--font-d);
    font-size: 1.1rem;
    font-weight: 700;
    letter-spacing: .06em;
    color: var(--white);
}
.form-card-title p {
    font-size: .78rem;
    color: var(--muted);
    margin-top: 1px;
}
.form-mode-badge {
    font-family: var(--font-d);
    font-size: .65rem;
    font-weight: 700;
    letter-spacing: .15em;
    text-transform: uppercase;
    padding: .25rem .7rem;
    border-radius: 2px;
    transition: all .2s;
}
.mode-new { color: var(--red); background: rgba(208,21,28,.1); border: 1px solid rgba(208,21,28,.25); }
.mode-edit { color: #f59e0b; background: rgba(245,158,11,.1); border: 1px solid rgba(245,158,11,.25); }

/* Form body */
.form-body { padding: 2rem; }

.form-section-label {
    font-family: var(--font-d);
    font-size: .7rem;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--red);
    display: flex;
    align-items: center;
    gap: .6rem;
    margin-bottom: 1.25rem;
}
.form-section-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: rgba(208,21,28,.15);
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.25rem 1.5rem;
    margin-bottom: 2rem;
}
.form-grid-2 {
    grid-template-columns: repeat(2, 1fr);
}
.form-grid-4 {
    grid-template-columns: 1fr 1.5fr 1.5fr 1fr;
}
.form-grid-full {
    grid-column: 1 / -1;
}

/* Field */
.field { display: flex; flex-direction: column; gap: .4rem; }
.field label {
    font-family: var(--font-d);
    font-size: .72rem;
    font-weight: 700;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--muted);
    display: flex;
    align-items: center;
    gap: .3rem;
}
.field label .req { color: var(--red); font-size: .8rem; }

.field input,
.field select {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 4px;
    color: var(--white);
    font-family: var(--font-b);
    font-size: .9rem;
    padding: .7rem .95rem;
    outline: none;
    transition: border-color .2s, box-shadow .2s, background .2s;
    width: 100%;
    appearance: none;
    -webkit-appearance: none;
}
.field input::placeholder { color: #444; }
.field input:focus,
.field select:focus {
    border-color: var(--red);
    box-shadow: 0 0 0 3px rgba(208,21,28,.1);
    background: var(--mid);
}
.field input:hover,
.field select:hover {
    border-color: #3a3a3a;
}

/* Select custom arrow */
.select-wrap { position: relative; }
.select-wrap::after {
    content: '';
    position: absolute;
    right: .9rem;
    top: 50%;
    transform: translateY(-50%);
    width: 0; height: 0;
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-top: 5px solid var(--muted);
    pointer-events: none;
    transition: border-top-color .2s;
}
.select-wrap:focus-within::after { border-top-color: var(--red); }
.select-wrap select { padding-right: 2.2rem; cursor: pointer; }
.select-wrap select option { background: var(--surface); }

/* Input prefix (ej. placa) */
.input-prefix-wrap { position: relative; }
.input-prefix {
    position: absolute;
    left: 0; top: 0; bottom: 0;
    padding: 0 .75rem;
    display: flex;
    align-items: center;
    font-family: var(--font-d);
    font-size: .72rem;
    font-weight: 700;
    letter-spacing: .1em;
    color: var(--red);
    background: rgba(208,21,28,.08);
    border-right: 1px solid rgba(208,21,28,.2);
    border-radius: 4px 0 0 4px;
    white-space: nowrap;
    user-select: none;
}
.input-prefix-wrap input { padding-left: 3.8rem; }

/* Field hint */
.field-hint { font-size: .74rem; color: #555; margin-top: 1px; }

/* Validation error */
.field-error { font-size: .75rem; color: var(--red); margin-top: 2px; display: none; }
.field.has-error input,
.field.has-error select { border-color: var(--red); box-shadow: 0 0 0 3px rgba(208,21,28,.08); }
.field.has-error .field-error { display: block; }

/* Form actions */
.form-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 1rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--border);
    flex-wrap: wrap;
}
.btn-cancel {
    font-family: var(--font-d);
    font-size: .78rem;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: var(--muted);
    background: none;
    border: 1px solid var(--border);
    padding: .6rem 1.4rem;
    border-radius: 3px;
    cursor: pointer;
    transition: all .2s;
}
.btn-cancel:hover { border-color: #444; color: var(--white); }
.btn-submit {
    font-family: var(--font-d);
    font-size: .8rem;
    font-weight: 700;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--white);
    background: var(--red);
    border: 1px solid var(--red);
    padding: .65rem 1.8rem;
    border-radius: 3px;
    cursor: pointer;
    transition: background .2s, box-shadow .2s, transform .15s;
    display: flex;
    align-items: center;
    gap: .5rem;
}
.btn-submit:hover { background: var(--red-dark); box-shadow: 0 4px 20px rgba(208,21,28,.35); transform: translateY(-1px); }
.btn-submit svg { width: 15px; height: 15px; }
.btn-submit.loading { opacity: .6; pointer-events: none; }

/* ════════════════════════════════════════
   TABLE SECTION
════════════════════════════════════════ */
.table-card {
    background: var(--mid);
    border: 1px solid var(--border);
    border-radius: 8px;
    overflow: hidden;
}
.table-header {
    padding: 1.25rem 1.75rem;
    border-bottom: 1px solid var(--border);
    background: rgba(208,21,28,.03);
    position: relative;
}
.table-header::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--red), rgba(208,21,28,.2), transparent);
}
.table-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
}
.table-title-group { display: flex; align-items: center; gap: .75rem; }
.table-title-group h3 {
    font-family: var(--font-d);
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: .06em;
    color: var(--white);
}
.record-count {
    font-family: var(--font-d);
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .12em;
    color: var(--muted);
    background: var(--surface);
    border: 1px solid var(--border);
    padding: .15rem .55rem;
    border-radius: 20px;
}

/* Toolbar controls */
.table-controls {
    display: flex;
    align-items: center;
    gap: .75rem;
    flex-wrap: wrap;
}
.search-wrap {
    position: relative;
}
.search-wrap svg {
    position: absolute;
    left: .75rem;
    top: 50%;
    transform: translateY(-50%);
    width: 15px; height: 15px;
    color: var(--muted);
    pointer-events: none;
    transition: color .2s;
}
.search-wrap:focus-within svg { color: var(--red); }
#tableSearch {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 4px;
    color: var(--white);
    font-family: var(--font-b);
    font-size: .85rem;
    padding: .5rem .85rem .5rem 2.3rem;
    outline: none;
    width: 220px;
    transition: border-color .2s, box-shadow .2s, width .3s;
}
#tableSearch::placeholder { color: #444; }
#tableSearch:focus {
    border-color: rgba(208,21,28,.4);
    box-shadow: 0 0 0 3px rgba(208,21,28,.08);
    width: 260px;
}

.btn-icon {
    width: 34px; height: 34px;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: var(--muted);
    transition: all .2s;
}
.btn-icon:hover { border-color: var(--red); color: var(--red); background: rgba(208,21,28,.08); }
.btn-icon svg { width: 15px; height: 15px; }

.per-page-select {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 4px;
    color: var(--muted);
    font-family: var(--font-b);
    font-size: .82rem;
    padding: .45rem .7rem;
    outline: none;
    cursor: pointer;
    transition: border-color .2s;
}
.per-page-select:focus { border-color: rgba(208,21,28,.4); color: var(--white); }

/* Table */
.table-responsive { overflow-x: auto; }
table {
    width: 100%;
    border-collapse: collapse;
    font-size: .85rem;
}
thead tr {
    border-bottom: 1px solid var(--border);
}
th {
    padding: .85rem 1rem;
    text-align: left;
    font-family: var(--font-d);
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .15em;
    text-transform: uppercase;
    color: var(--muted);
    white-space: nowrap;
    user-select: none;
    background: rgba(0,0,0,.2);
}
th.sortable { cursor: pointer; }
th.sortable:hover { color: var(--white); }
th.sorted-asc .sort-icon::after  { content: ' ↑'; color: var(--red); }
th.sorted-desc .sort-icon::after { content: ' ↓'; color: var(--red); }
th.sorted-asc, th.sorted-desc { color: var(--red); }

th:first-child, td:first-child { padding-left: 1.75rem; }
th:last-child,  td:last-child  { padding-right: 1.75rem; }

tbody tr {
    border-bottom: 1px solid rgba(255,255,255,.03);
    transition: background .15s;
}
tbody tr:last-child { border-bottom: none; }
tbody tr:hover { background: rgba(255,255,255,.025); }
tbody tr.editing-row { background: rgba(208,21,28,.05); border-left: 2px solid var(--red); }

td {
    padding: .9rem 1rem;
    color: var(--text);
    vertical-align: middle;
    white-space: nowrap;
}
td.text-muted-cell { color: var(--muted); font-size: .82rem; }

/* Placa pill */
.placa-pill {
    display: inline-flex;
    align-items: center;
    font-family: var(--font-d);
    font-size: .82rem;
    font-weight: 700;
    letter-spacing: .15em;
    color: var(--white);
    background: var(--surface);
    border: 1px solid var(--border);
    padding: .2rem .65rem;
    border-radius: 3px;
}

/* Action buttons */
.action-group { display: flex; align-items: center; gap: .4rem; }
.btn-action {
    width: 30px; height: 30px;
    border-radius: 3px;
    border: 1px solid transparent;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all .18s;
    background: none;
}
.btn-action svg { width: 14px; height: 14px; }
.btn-edit  { color: #60a5fa; border-color: rgba(96,165,250,.15); }
.btn-edit:hover  { background: rgba(96,165,250,.1); border-color: rgba(96,165,250,.35); }
.btn-view  { color: #a3a3a3; border-color: rgba(163,163,163,.15); }
.btn-view:hover  { background: rgba(163,163,163,.1); border-color: rgba(163,163,163,.35); }
.btn-delete { color: var(--red); border-color: rgba(208,21,28,.15); }
.btn-delete:hover { background: rgba(208,21,28,.12); border-color: rgba(208,21,28,.35); }

/* Empty state */
.empty-state {
    padding: 4rem 2rem;
    text-align: center;
}
.empty-icon {
    width: 56px; height: 56px;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
}
.empty-icon svg { width: 24px; height: 24px; color: var(--muted); }
.empty-state h4 {
    font-family: var(--font-d);
    font-size: 1rem;
    font-weight: 600;
    color: var(--white);
    margin-bottom: .4rem;
}
.empty-state p { font-size: .85rem; color: var(--muted); }

/* Table footer / pagination */
.table-footer {
    padding: 1rem 1.75rem;
    border-top: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
    background: rgba(0,0,0,.15);
}
.table-info { font-size: .78rem; color: var(--muted); }
.table-info strong { color: var(--text); }

.pagination {
    display: flex;
    align-items: center;
    gap: .3rem;
    list-style: none;
}
.pagination li button {
    width: 30px; height: 30px;
    border-radius: 3px;
    border: 1px solid var(--border);
    background: var(--surface);
    color: var(--muted);
    font-family: var(--font-d);
    font-size: .78rem;
    font-weight: 600;
    cursor: pointer;
    transition: all .15s;
    display: flex;
    align-items: center;
    justify-content: center;
}
.pagination li button:hover { border-color: rgba(208,21,28,.4); color: var(--red); }
.pagination li button.active { background: var(--red); border-color: var(--red); color: var(--white); }
.pagination li button:disabled { opacity: .3; cursor: not-allowed; }

/* ════════════════════════════════════════
   MODAL (delete confirm + view detail)
════════════════════════════════════════ */
.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.75);
    backdrop-filter: blur(4px);
    z-index: 2000;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}
.modal-overlay.open { display: flex; }

.modal {
    background: var(--mid);
    border: 1px solid var(--border);
    border-radius: 8px;
    width: 100%;
    max-width: 460px;
    position: relative;
    overflow: hidden;
    animation: modalIn .25s ease both;
}
@keyframes modalIn { from{opacity:0;transform:scale(.95) translateY(10px)} to{opacity:1;transform:scale(1) translateY(0)} }

.modal-top-bar {
    height: 3px;
    background: var(--red);
}
.modal-header {
    padding: 1.25rem 1.5rem 0;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 1rem;
}
.modal-header h3 {
    font-family: var(--font-d);
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--white);
}
.modal-header p { font-size: .85rem; color: var(--muted); margin-top: .25rem; }
.modal-close {
    width: 28px; height: 28px;
    border-radius: 3px;
    border: 1px solid var(--border);
    background: none;
    color: var(--muted);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all .15s;
    flex-shrink: 0;
}
.modal-close:hover { border-color: var(--red); color: var(--red); }
.modal-close svg { width: 14px; height: 14px; }

.modal-body { padding: 1.25rem 1.5rem; }
.modal-body p { font-size: .88rem; color: var(--muted); line-height: 1.7; }
.modal-body strong { color: var(--white); }

.detail-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: .75rem;
    margin-top: .5rem;
}
.detail-item { display: flex; flex-direction: column; gap: .2rem; }
.detail-label {
    font-family: var(--font-d);
    font-size: .65rem;
    font-weight: 700;
    letter-spacing: .15em;
    text-transform: uppercase;
    color: var(--muted);
}
.detail-value { font-size: .88rem; color: var(--white); }

.modal-footer {
    padding: 1rem 1.5rem 1.5rem;
    display: flex;
    justify-content: flex-end;
    gap: .75rem;
}
.btn-modal-cancel {
    font-family: var(--font-d);
    font-size: .75rem;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: var(--muted);
    background: none;
    border: 1px solid var(--border);
    padding: .55rem 1.2rem;
    border-radius: 3px;
    cursor: pointer;
    transition: all .15s;
}
.btn-modal-cancel:hover { border-color: #444; color: var(--white); }
.btn-modal-confirm {
    font-family: var(--font-d);
    font-size: .75rem;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: var(--white);
    background: var(--red);
    border: 1px solid var(--red);
    padding: .55rem 1.2rem;
    border-radius: 3px;
    cursor: pointer;
    transition: all .15s;
}
.btn-modal-confirm:hover { background: var(--red-dark); }

/* ════════════════════════════════════════
   TOAST
════════════════════════════════════════ */
.toast-container {
    position: fixed;
    bottom: 1.5rem;
    right: 1.5rem;
    z-index: 3000;
    display: flex;
    flex-direction: column;
    gap: .5rem;
}
.toast {
    display: flex;
    align-items: center;
    gap: .75rem;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 6px;
    padding: .85rem 1.1rem;
    min-width: 260px;
    max-width: 360px;
    animation: toastIn .3s ease both;
    box-shadow: 0 8px 32px rgba(0,0,0,.5);
}
@keyframes toastIn { from{opacity:0;transform:translateY(10px)} to{opacity:1;transform:translateY(0)} }
.toast.success { border-left: 3px solid #22c55e; }
.toast.error   { border-left: 3px solid var(--red); }
.toast.info    { border-left: 3px solid #60a5fa; }
.toast-icon { flex-shrink: 0; }
.toast-icon svg { width: 16px; height: 16px; }
.toast.success .toast-icon svg { color: #22c55e; }
.toast.error   .toast-icon svg { color: var(--red); }
.toast.info    .toast-icon svg { color: #60a5fa; }
.toast-text { font-size: .83rem; color: var(--text); flex: 1; }
.toast-text strong { font-family: var(--font-d); font-size: .88rem; letter-spacing: .04em; display: block; }

/* Responsive */
@media(max-width: 900px){
    .form-grid, .form-grid-4 { grid-template-columns: repeat(2,1fr); }
}
@media(max-width: 600px){
    .form-grid, .form-grid-4 { grid-template-columns: 1fr; }
    .form-card-header { flex-direction: column; align-items: flex-start; gap: 1rem; }
    .form-actions { flex-direction: column; width: 100%; gap: 0.75rem; }
    .form-actions a, .form-actions button { width: 100%; justify-content: center; }
    .table-toolbar { flex-direction: column; align-items: flex-start; gap: 1rem; }
    .table-controls { width: 100%; justify-content: flex-start; }
    #tableSearch { width: 100%; }
    #tableSearch:focus { width: 100%; }
    .table-footer { flex-direction: column; align-items: flex-start; gap: 1rem; }
    .action-group .btn-view { display: none; }
}
</style>
@endpush

@section('content')

<!-- ══ PAGE HEADER ══ -->
<div class="page-hero">
    <div class="page-hero-inner">
        <div>
            <div class="page-breadcrumb">
                <a href="{{ url('/') }}">Inicio</a>
                <span>/</span>
                <span>Registro de Vehículos</span>
            </div>
            <h1 class="page-title">Registro de <em>Vehículos</em></h1>
            <p class="page-subtitle">Ingresa y administra la información de cada unidad</p>
        </div>
        <span class="page-badge">Módulo activo</span>
    </div>
</div>

<!-- ══ MAIN ══ -->
<div class="vehicles-layout">

    <!-- ──────── FORM ──────── -->
    <div class="form-card" id="formCard">
        <div class="form-card-header">
            <div class="form-card-title">
                <div class="form-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/>
                    </svg>
                </div>
                <div>
                    <h2 id="formTitle">{{ isset($post) ? 'Editar Registro' : 'Nuevo Registro' }}</h2>
                    <p id="formSubtitle">{{ isset($post) ? 'Modifica los datos del vehículo' : 'Completa todos los campos obligatorios' }}</p>
                </div>
            </div>
            <span class="form-mode-badge mode-{{ isset($post) ? 'edit' : 'new' }}" id="modeBadge">{{ isset($post) ? 'Editando' : 'Nuevo' }}</span>
        </div>

        <div class="form-body">
            <form id="vehicleForm" action="{{ isset($post) ? route('vehicles.update', $post->carro_id) : route('vehicles.store') }}" method="POST">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif

                @if(session('success'))
                    <div class="toast-container" style="position:static; margin-bottom: 2rem;">
                        <div class="toast success" style="max-width: 100%;">
                            <span class="toast-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            </span>
                            <span class="toast-text"><strong>¡Éxito!</strong> {{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="toast-container" style="position:static; margin-bottom: 2rem;">
                        <div class="toast error" style="max-width: 100%;">
                            <span class="toast-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                            </span>
                            <span class="toast-text">
                                <strong>Error de validación</strong>
                                Por favor revisa los campos marcados en rojo.
                            </span>
                        </div>
                    </div>
                @endif

                <!-- Sección Vehículo -->
                <div class="form-section-label">Datos del Vehículo</div>
                <div class="form-grid form-grid-4">

                    <div class="field @error('placa') has-error @enderror" id="f-placa">
                        <label>Placa <span class="req">*</span></label>
                        <div class="input-prefix-wrap">
                            <span class="input-prefix">PE</span>
                            <input type="text" name="placa" id="placa"
                                placeholder="ABC-123"
                                maxlength="8"
                                style="text-transform:uppercase"
                                value="{{ old('placa', $post->placa ?? '') }}"
                                required>
                        </div>
                        <span class="field-hint">Formato: ABC-123</span>
                        @error('placa')
                            <span class="field-error">{{ $message }}</span>
                        @else
                            <span class="field-error">Ingresa una placa válida</span>
                        @enderror
                    </div>

                    <div class="field @error('marca') has-error @enderror" id="f-marca">
                        <label>Marca <span class="req">*</span></label>
                        <div class="select-wrap">
                            <select name="marca" id="marca" required>
                                <option value="">Seleccionar marca…</option>
                                @foreach(['Audi', 'BMW', 'Mercedes-Benz', 'Porsche', 'Lexus', 'Volvo', 'Land Rover', 'Jaguar', 'Infiniti', 'Acura', 'Cadillac', 'Lincoln', 'Toyota', 'Honda', 'Nissan', 'Hyundai', 'Kia', 'Subaru', 'Ford', 'Chevrolet', 'Otro'] as $m)
                                    <option value="{{ $m }}" {{ old('marca', $post->marca ?? '') == $m ? 'selected' : '' }}>{{ $m }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('marca')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field @error('modelo') has-error @enderror" id="f-modelo">
                        <label>Modelo <span class="req">*</span></label>
                        <input type="text" name="modelo" id="modelo" placeholder="Ej: Corolla, Serie 3…" value="{{ old('modelo', $post->modelo ?? '') }}" required>
                        @error('modelo')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field @error('anio') has-error @enderror" id="f-anio">
                        <label>Año <span class="req">*</span></label>
                        <div class="select-wrap">
                            <select name="anio" id="anio" required>
                                <option value="">Año…</option>
                                @for($y = date('Y'); $y >= 1980; $y--)
                                    <option value="{{ $y }}" {{ old('anio', $post->anio_fabricacion ?? '') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                        @error('anio')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Sección Cliente -->
                <div class="form-section-label">Datos del Cliente</div>
                <div class="form-grid">

                    <div class="field @error('nombres') has-error @enderror" id="f-nombres">
                        <label>Nombre(s) <span class="req">*</span></label>
                        <input type="text" name="nombres" id="nombres" placeholder="Nombre del cliente" value="{{ old('nombres', $post->cliente->nombres ?? '') }}" required>
                        @error('nombres')<span class="field-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="field @error('apellidos') has-error @enderror" id="f-apellidos">
                        <label>Apellidos <span class="req">*</span></label>
                        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del cliente" value="{{ old('apellidos', $post->cliente->apellidos ?? '') }}" required>
                        @error('apellidos')<span class="field-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="field @error('documento') has-error @enderror" id="f-documento">
                        <label>Nro. Documento <span class="req">*</span></label>
                        <input type="text" name="documento" id="documento" placeholder="DNI / CE / Pasaporte" maxlength="12" value="{{ old('documento', $post->cliente->numero_documento ?? '') }}" required>
                        @error('documento')<span class="field-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="field @error('correo') has-error @enderror" id="f-correo">
                        <label>Correo <span class="req">*</span></label>
                        <input type="email" name="correo" id="correo" placeholder="correo@ejemplo.com" value="{{ old('correo', $post->cliente->correo ?? '') }}" required>
                        @error('correo')<span class="field-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="field @error('telefono') has-error @enderror" id="f-telefono">
                        <label>Teléfono <span class="req">*</span></label>
                        <input type="tel" name="telefono" id="telefono" placeholder="9XX XXX XXX" maxlength="12" value="{{ old('telefono', $post->cliente->telefono ?? '') }}" required>
                        @error('telefono')<span class="field-error">{{ $message }}</span>@enderror
                    </div>
                    
                    <input type="hidden" name="created_at" value="{{ old('created_at', isset($post) && isset($post->createdAt) ? $post->createdAt : now()->format('Y-m-d')) }}">

                </div>

                <div class="form-actions">
                    @if(isset($post))
                        <a href="{{ route('registro.index') }}" class="btn-cancel" style="text-decoration:none; display:inline-flex; align-items:center; justify-content:center;">Cancelar Edición</a>
                    @else
                        <button type="reset" class="btn-cancel" id="btnCancel">Limpiar Formulario</button>
                    @endif
                    <button type="submit" class="btn-submit" id="btnSubmit">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        <span id="btnLabel">{{ isset($post) ? 'Actualizar Registro' : 'Guardar Registro' }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div><!-- /form-card -->

    <!-- ──────── TABLE ──────── -->
    <div class="table-card">
        <div class="table-header">
            <div class="table-toolbar">
                <div class="table-title-group">
                    <h3>Registros de Vehículos</h3>
                    <span class="record-count" id="recordCount">{{ $posts->total() }} registros</span>
                </div>
                <div class="table-controls">
                    <div class="search-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        <input type="text" id="tableSearch" placeholder="Buscar registro…">
                    </div>
                    <select class="per-page-select" id="perPage" title="Registros por página">
                        <option value="5">5 / pág</option>
                        <option value="10" selected>10 / pág</option>
                        <option value="25">25 / pág</option>
                        <option value="50">50 / pág</option>
                    </select>
                    <button class="btn-icon" id="btnExport" title="Exportar CSV">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                    </button>
                    <button class="btn-icon" id="btnRefresh" title="Actualizar tabla">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="vehiclesTable">
                <thead>
                    <tr>
                        <th class="sortable" data-col="placa"><span class="sort-icon">Placa</span></th>
                        <th class="sortable" data-col="marca"><span class="sort-icon">Marca</span></th>
                        <th class="sortable" data-col="modelo"><span class="sort-icon">Modelo</span></th>
                        <th class="sortable" data-col="anio"><span class="sort-icon">Año</span></th>
                        <th class="sortable" data-col="nombre"><span class="sort-icon">Cliente</span></th>
                        <th>Documento</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th style="text-align:center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @forelse($posts as $post)
                    <tr data-id="{{ $post->carro_id }}">
                        <td><span class="placa-pill">{{ $post->placa }}</span></td>
                        <td>{{ $post->marca }}</td>
                        <td class="text-muted-cell">{{ $post->modelo }}</td>
                        <td class="text-muted-cell">{{ $post->anio_fabricacion }}</td>
                        <td>{{ $post->cliente->nombres }} {{ $post->cliente->apellidos }}</td>
                        <td class="text-muted-cell">{{ $post->cliente->numero_documento }}</td>
                        <td class="text-muted-cell" style="max-width:160px;overflow:hidden;text-overflow:ellipsis">{{ $post->cliente->correo }}</td>
                        <td class="text-muted-cell">{{ $post->cliente->telefono }}</td>
                        <td>
                            <div class="action-group" style="justify-content:center">
                                <a href="{{ route('vehicles.show', $post->carro_id) }}" class="btn-action btn-view" title="Ver detalle">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                </a>
                                <a href="{{ route('vehicles.edit', $post->carro_id) }}" class="btn-action btn-edit" title="Editar">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                </a>
                                <form action="{{ route('vehicles.destroy', $post->carro_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar el registro del vehículo {{ $post->placa }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Eliminar">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9">
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
                                </div>
                                <h4>Sin registros aún</h4>
                                <p>Usa el formulario de arriba para agregar el primer vehículo</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="table-footer">
            <span class="table-info" id="tableInfo">Mostrando <strong>{{ $posts->firstItem() ?? 0 }}</strong> a <strong>{{ $posts->lastItem() ?? 0 }}</strong> de <strong>{{ $posts->total() ?? 0 }}</strong> registros</span>
            <div class="pagination" id="pagination">
                {{ $posts->links() }}
            </div>
        </div>
    </div><!-- /table-card -->

</div><!-- /vehicles-layout -->

<!-- ══ MODAL: Confirmar eliminación ══ -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal">
        <div class="modal-top-bar"></div>
        <div class="modal-header">
            <div>
                <h3>Eliminar Registro</h3>
                <p>Esta acción no se puede deshacer</p>
            </div>
            <button class="modal-close" data-close="deleteModal">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <div class="modal-body">
            <p>¿Estás seguro de que deseas eliminar el registro del vehículo <strong id="deleteTarget">—</strong>? Se perderán todos los datos asociados.</p>
        </div>
        <div class="modal-footer">
            <button class="btn-modal-cancel" data-close="deleteModal">Cancelar</button>
            <button class="btn-modal-confirm" id="confirmDelete">Sí, eliminar</button>
        </div>
    </div>
</div>

<!-- ══ MODAL: Detalle ══ -->
<div class="modal-overlay" id="viewModal">
    <div class="modal" style="max-width:520px">
        <div class="modal-top-bar"></div>
        <div class="modal-header">
            <div>
                <h3>Detalle del Registro</h3>
                <p id="viewPlaca" style="font-family:var(--font-d);color:var(--red);letter-spacing:.1em">—</p>
            </div>
            <button class="modal-close" data-close="viewModal">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <div class="modal-body">
            <div class="detail-grid" id="detailGrid"></div>
        </div>
        <div class="modal-footer">
            <button class="btn-modal-cancel" data-close="viewModal">Cerrar</button>
        </div>
    </div>
</div>

<!-- ══ TOAST CONTAINER ══ -->
<div class="toast-container" id="toastContainer"></div>

@endsection

@push('scripts')
<script>
/* ════════════════════════════════════════
   VIP2CARS — Vehicle Registry Module
════════════════════════════════════════ */
(function () {
    'use strict';

    // We removed the localStorage 'records' array since Laravel now provides $posts
    // Search, Pagination, and Sort should ideally be done server-side using query parameters.
    // For now, we will leave the table as rendered by Laravel Blade.

    /* ── Sort ── */
    /* ── Sorting (visual placeholder without backend implementation) ── */

    /* ── Refresh ── */
    /* ── Refresh ── */
    document.getElementById('btnRefresh')?.addEventListener('click', () => {
        window.location.reload();
    });

    /* ── Modal close ── */
    document.querySelectorAll('[data-close]').forEach(btn => {
        btn.addEventListener('click', () => closeModal(btn.dataset.close));
    });
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', e => { if (e.target===overlay) closeModal(overlay.id); });
    });

    /* ── Init ── */
    renderTable();

})();
</script>
@endpush
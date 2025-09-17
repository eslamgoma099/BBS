@extends('admin.layouts.admin-app')

@section('style')
  {{-- ثيم الجديد: بنكتفي بـ CSS الأساسية بدون Bootstrap عشان مايحصلش تعارض --}}
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  <style>
    /* لمسات بسيطة من الثيم الجديد */
    .settings-head {display:flex;align-items:center;gap:.75rem;margin-bottom:1rem}
    .settings-head h1{font-size:1.25rem;margin:0}
    .settings-grid{display:grid;gap:12px;grid-template-columns:repeat(12,1fr)}
    .settings-grid>.col{grid-column:span 12}
    @media (min-width:768px){ .settings-grid>.col-md-6{grid-column:span 6} }
    @media (min-width:1200px){ .settings-grid>.col-lg-4{grid-column:span 4} }
    .settings-card{border:1px solid rgba(255,255,255,.06);border-radius:14px;padding:16px;background:rgba(255,255,255,.02)}
    .settings-card h5{margin:0 0 6px}
    .settings-card p{margin:0 0 12px;color:#9aa0a6}
    .settings-card .btn{min-width:130px}
    body.crypt-light .settings-card{background:#fff;border-color:#f0f0f0}
    /* صور البروفايل الصغيره */
    .profile_menu .btn img{width:48px;height:48px;border-radius:50%;object-fit:cover}
  </style>
@endsection

@section('content')
  {{-- مفيش هيدر/سايدبار هنا — دول موجودين في الـ layout بالفعل --}}
  <div class="container-fluid px-2 px-md-3">
    <div class="settings-head">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path opacity=".4" d="M2 12.88v-1.76C2 10.08 2.85 9.22 3.9 9.22c1.81 0 2.55-1.28 1.64-2.85-.52-.9-.21-2.07.69-2.59l1.73-.99c.79-.47 1.81-.19 2.28.6l.11.19c.9 1.57 2.38 1.57 3.29 0l.11-.19c.47-.79 1.49-1.07 2.28-.6l1.73.99c.91.52 1.23 1.68.71 2.59-.91 1.57-.17 2.85 1.64 2.85 1.04 0 1.9.86 1.9 1.9v1.76c0 1.04-.85 1.9-1.9 1.9-1.81 0-2.55 1.28-1.64 2.85.52.91.2 2.07-.71 2.59l-1.73 1c-.79.46-1.81.18-2.28-.61l-.11-.19c-.9-1.57-2.39-1.57-3.29 0l-.11.19c-.47.79-1.49 1.07-2.28.61l-1.73-1c-.9-.52-1.21-1.68-.69-2.59.91-1.57.17-2.85-1.64-2.85C2.85 14.78 2 13.92 2 12.88Z"/></svg>
      <h1 class="fw-semibold">Settings</h1>
    </div>

    {{-- Cards (تجميع إعدادات النظام القديمة لكن بستايل الثيم الجديد) --}}
    <div class="settings-grid">
      {{-- Site / General --}}
      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>Site Settings</h5>
          <p>Logo, title, description, favicons…</p>
          <a href="{{ route('admin.settings.site_settings') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>Fees Setting</h5>
          <p>Commissions, spreads & fees.</p>
          <a href="{{ route('admin.settings.fees') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>Overnight Commissions</h5>
          <p>Swap / overnight rules.</p>
          <a href="{{ route('admin.overnights') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      {{-- Payments --}}
      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>Payment Methods</h5>
          <p>Cards, bank, gateways…</p>
          <a href="{{ route('admin.settings.payment_methods') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>Crypto Payment Methods</h5>
          <p>Wallets & networks.</p>
          <a href="{{ route('admin.p_methods.index') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>Custom Payment Link</h5>
          <p>Manual top-up links.</p>
          <a href="{{ route('admin.settings.c_payment') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      {{-- Trading / Risk --}}
      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>Margin Call</h5>
          <p>Risk thresholds & alerts.</p>
          <a href="{{ route('admin.margin.call') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      {{-- Communications --}}
      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>SMTP Settings</h5>
          <p>Outgoing mail server.</p>
          <a href="{{ route('admin.settings.smtp') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>Mail Setting</h5>
          <p>Templates & notifications.</p>
          <a href="{{ route('admin.settings.mails') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      {{-- Integrations --}}
      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>CRM Settings</h5>
          <p>Integration & sync.</p>
          <a href="{{ route('admin.settings.crm') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>APIs Setting</h5>
          <p>Keys & webhooks.</p>
          <a href="{{ route('admin.settings.apis') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      {{-- Content --}}
      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>Pages Setting</h5>
          <p>Static pages & content.</p>
          <a href="{{ route('admin.settings.pages') }}" class="btn btn-primary">Open</a>
        </div>
      </div>

      {{-- Leads --}}
      <div class="col col-md-6 col-lg-4">
        <div class="settings-card">
          <h5>Lead Config</h5>
          <p>Statuses, sources & rules.</p>
          <a href="{{ route('admin.settings.lead.config') }}" class="btn btn-primary">Open</a>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  {{-- سكريبتات خفيفة من الثيم الجديد (الهاندلرز فقط — مفيش تكرار Bootstrap) --}}
  <script>
    // فتح/غلق Submenus في السايدبار (لو محتاج)
    document.querySelectorAll('[data-sub-toggle]').forEach(function(link){
      link.addEventListener('click', function(e){
        e.preventDefault();
        link.classList.toggle('show-sub');
        const next = link.nextElementSibling;
        if(next) next.style.maxHeight = next.style.maxHeight ? null : '500px';
        document.querySelectorAll('[data-sub-toggle]').forEach(function(other){
          if(other !== link) other.classList.remove('show-sub');
        });
      });
    });
  </script>
@endsection

%extends('layouts.default')

%block('title', 'Bow Framework')

%block('content')
<style>
    .page-wrapper {
        min-height: 100vh;
        display: grid;
        grid-template-rows: auto 1fr auto;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem 3rem;
        border-bottom: 1px solid var(--bow-border);
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .brand img {
        height: 36px;
    }

    .brand span {
        font-weight: 600;
        font-size: 1.25rem;
        color: var(--bow-light);
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .nav-links a {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--bow-gray);
        font-size: 0.9rem;
        font-weight: 500;
    }

    .nav-links a:hover {
        color: var(--bow-light);
    }

    .nav-links a svg {
        width: 20px;
        height: 20px;
    }

    .hero-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 6rem 2rem;
        background: radial-gradient(ellipse at 50% 0%, rgba(230, 57, 70, 0.08) 0%, transparent 60%);
    }

    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 700;
        color: var(--bow-light);
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .hero-section h1 span {
        background: linear-gradient(135deg, var(--bow-red) 0%, #ff6b6b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-section p {
        font-size: 1.2rem;
        color: var(--bow-gray);
        max-width: 600px;
        margin-bottom: 2.5rem;
        line-height: 1.7;
    }

    .cta-buttons {
        display: flex;
        gap: 1rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.875rem 1.75rem;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.2s;
    }

    .btn-primary {
        background: var(--bow-red);
        color: white;
    }

    .btn-primary:hover {
        background: var(--bow-red-dark);
        color: white;
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: var(--bow-border);
        color: var(--bow-light);
    }

    .btn-secondary:hover {
        background: #3d3d3d;
        color: white;
    }

    .features {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1px;
        background: var(--bow-border);
        border-top: 1px solid var(--bow-border);
        border-bottom: 1px solid var(--bow-border);
    }

    @media (max-width: 900px) {
        .features {
            grid-template-columns: 1fr;
        }
    }

    .feature {
        background: var(--bow-darker);
        padding: 3rem;
        text-align: center;
    }

    .feature-icon {
        width: 48px;
        height: 48px;
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, var(--bow-red) 0%, #ff6b6b 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .feature-icon svg {
        width: 24px;
        height: 24px;
        color: white;
    }

    .feature h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--bow-light);
        margin-bottom: 0.75rem;
    }

    .feature p {
        font-size: 0.9rem;
        color: var(--bow-gray);
        line-height: 1.6;
    }

    .code-section {
        padding: 5rem 3rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .code-section h2 {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--bow-light);
        margin-bottom: 0.5rem;
    }

    .code-section > p {
        color: var(--bow-gray);
        margin-bottom: 2rem;
    }

    .code-block {
        background: var(--bow-dark);
        border: 1px solid var(--bow-border);
        border-radius: 12px;
        padding: 1.5rem 2rem;
        max-width: 700px;
        width: 100%;
        overflow-x: auto;
    }

    .code-block pre {
        font-family: 'JetBrains Mono', 'Fira Code', monospace;
        font-size: 0.9rem;
        line-height: 1.7;
        color: #abb2bf;
    }

    .code-block .keyword { color: #c678dd; }
    .code-block .function { color: #61afef; }
    .code-block .string { color: #98c379; }
    .code-block .variable { color: #e06c75; }
    .code-block .comment { color: #5c6370; font-style: italic; }

    footer {
        padding: 2rem 3rem;
        border-top: 1px solid var(--bow-border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    footer p {
        font-size: 0.85rem;
        color: var(--bow-gray);
    }

    .footer-links {
        display: flex;
        gap: 1.5rem;
    }

    .footer-links a {
        color: var(--bow-gray);
        font-size: 0.85rem;
    }

    .footer-links a:hover {
        color: var(--bow-light);
    }
</style>

<div class="page-wrapper">
    <header>
        <div class="brand">
            <img src="/img/logo.svg" alt="Bow">
            <span>Bow</span>
        </div>
        <nav class="nav-links">
            <a href="https://bowphp.com" target="_blank">Documentation</a>
            <a href="https://github.com/bowphp" target="_blank">
                <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                GitHub
            </a>
        </nav>
    </header>

    <main>
        <section class="hero-section">
            <h1>Construisez avec <span>Bow</span></h1>
            <p>Un framework PHP léger et expressif conçu pour les développeurs qui valorisent la simplicité et la productivité.</p>
            <div class="cta-buttons">
                <a href="https://bowphp.com" target="_blank" class="btn btn-primary">
                    Démarrer
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="https://github.com/bowphp/app" target="_blank" class="btn btn-secondary">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    Voir sur GitHub
                </a>
            </div>
        </section>

        <section class="features">
            <div class="feature">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3>Rapide</h3>
                <p>Architecture légère optimisée pour des performances maximales.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16m-7 6h7"/></svg>
                </div>
                <h3>Simple</h3>
                <p>API intuitive et documentation complète pour démarrer rapidement.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                </div>
                <h3>Flexible</h3>
                <p>Modulaire et extensible selon les besoins de votre projet.</p>
            </div>
        </section>

        <section class="code-section">
            <h2>Commencez en quelques lignes</h2>
            <p>Définissez vos routes simplement</p>
            <div class="code-block">
                <pre><span class="comment">// routes/app.php</span><br /><span class="variable">$router</span>-><span class="function">get</span>(<span class="string">'/'</span>, <span class="keyword">fn</span>() => <span class="function">view</span>(<span class="string">'welcome'</span>));<br /><span class="variable">$router</span>-><span class="function">get</span>(<span class="string">'/users/:id'</span>, [UserController::<span class="keyword">class</span>, <span class="string">'show'</span>]);</pre>
            </div>
        </section>
    </main>

    <footer>
        <p>Bow Framework v5 &mdash; Made with care</p>
        <div class="footer-links">
            <a href="https://bowphp.com" target="_blank">Docs</a>
            <a href="https://github.com/bowphp" target="_blank">GitHub</a>
        </div>
    </footer>
</div>
%endblock

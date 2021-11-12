<footer class="section-end">
    <div class="section-end-container">
        <h2 class="section-end__headline">Night Party</h2>
        <h3>Una experiencia única</h3>
        <div class="hero__btn-container">
            @if(Request::is('/'))
            <x-link-button :linkButton="$linkButton" />
            @endif
        </div>
    </div>
        <p class="section-end__footer">Todos los derechos reservados &copy;</p>
</footer>

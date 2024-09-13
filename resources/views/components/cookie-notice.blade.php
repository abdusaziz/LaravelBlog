<div id="cookieNotice" class="cookie-notice alert alert-warning fixed-bottom text-center" style="display: none;">
    <div class="container">
        <p>
            We use cookies to ensure you get the best experience on our website. 
            <a href="/privacy-policy" class="text-info">Learn more</a>.
        </p>
        <button class="btn btn-primary" onclick="acceptCookies()">Accept</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (!localStorage.getItem('cookieAccepted')) {
            document.getElementById('cookieNotice').style.display = 'block';
        }
    });

    function acceptCookies() {
        localStorage.setItem('cookieAccepted', 'true');
        document.getElementById('cookieNotice').style.display = 'none';
    }
</script>

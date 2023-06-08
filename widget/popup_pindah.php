<script>
    let popup = document.createElement('div');
    popup.id = "notifikasi_popup";
    popup.innerText = <?= json_encode($pesan["text"]) ?>;
    popup.style.textAlign = 'center';
    popup.style.justifyContent = 'center';
    popup.style.fontSize = '18px';
    popup.style.lineHeight = '100px';
    popup.style.position = 'fixed';
    popup.style.color = 'var(--w1)';
    popup.style.fontFamily = 'sans-serif';
    popup.style.zIndex = '100';
    popup.style.width = '600px';
    popup.style.height = '100px';
    popup.style.top = '-100px';
    popup.style.borderBottomLeftRadius = '20px';
    popup.style.borderBottomRightRadius = '20px';
    popup.style.background = <?= json_encode($pesan["background"]) ?>;
    popup.style.animation = 'muncul_atas 500ms ease forwards';
    popup.style.left = "calc((100vw - 600px) / 2)";
    document.querySelector('body').appendChild(popup);
    setTimeout(() => {
        popup.style.top = '0px';
    }, 500);
    setTimeout(() => {
        popup.style.animation = 'hilang_atas 300ms ease forwards';
    }, 1500);
    setTimeout(() => {
        popup.remove();
        window.location.href = <?= json_encode($pesan["link"]) ?>;
    }, 1800);
</script>
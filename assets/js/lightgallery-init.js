console.log('JS load start');

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded fired');
    
    const galleries = document.querySelectorAll('.wp-block-gallery');
    
    galleries.forEach((gallery) => {
        if (!gallery.classList.contains('lg-initialized')) {
            lightGallery(gallery, {
                selector: '.wp-block-image a',
                speed: 500,
                // プラグインがグローバルに存在する場合のみ安全に追加する
                plugins: [
                    typeof lgThumbnail !== 'undefined' ? lgThumbnail : null,
                    typeof lgDownload !== 'undefined' ? lgDownload : null
                ].filter(Boolean), // null を除外
                thumbWidth: 80,              
                thumbHeight: '60px',         
                subHtmlSelectorRelative: true,
            });
            gallery.classList.add('lg-initialized');
            console.log('lightGallery initialized with plugins!');
        }
    });
});

console.log('JS load end');
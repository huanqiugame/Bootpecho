document.addEventListener('DOMContentLoaded', function() {
    //// 为媒体元素添加fluid和rounded类
    // 获取页面中所有的img和video元素
    const mediaElements = document.querySelectorAll('img, video');

    // 遍历每个media元素
    mediaElements.forEach(media => {
        // 检查是否已经存在.img-fluid类，如果不存在则添加
        if (!media.classList.contains('img-fluid')) {
            media.classList.add('img-fluid');
        }

        // 检查是否已经存在.rounded类，如果不存在则添加
        if (!media.classList.contains('rounded')) {
            media.classList.add('rounded');
        }
    });

    //// 添加GitHub Style Alert
    let all_blockquote = document.querySelectorAll("blockquote");
    const colorMap = {
        "[!NOTE]": "note",
        "[!TIP]": "tip",
        "[!IMPORTANT]": "important",
        "[!WARNING]": "warning",
        "[!CAUTION]": "caution"
    };

    if (all_blockquote && all_blockquote.length > 0) {
        all_blockquote.forEach(blockquote => {
            if (blockquote.innerText) {
                for (let key in colorMap) {
                    if (blockquote.innerText.startsWith(key)) {
                        blockquote.removeChild(blockquote.firstElementChild);
                        blockquote.classList.add(`blockquote_${colorMap[key]}`);
                        break;
                    }
                }
            }
        });
    }
});

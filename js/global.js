document.addEventListener('DOMContentLoaded', function() {
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
});

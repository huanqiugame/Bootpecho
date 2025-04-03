// 原作者：HelloWuJiaYi
// https://github.com/HelloWuJiaYi/PostToc
// 为适配主题有部分修改

document.addEventListener("DOMContentLoaded", function () {
    // 确保 DOM 内容加载完成后再执行

    // 设置目录项的默认文本颜色
    // document.querySelectorAll('#post-toc ul li a').forEach(function(a) {
    //     a.style.color = textColor;  
    // });

    // 定义可能包含文章内容的几个容器类名
    var selectors = [
        '.post-content', 
        '.entry-content', 
        '.article-content', 
        '.markdown-body', 
        '.content-body',
        '.joe_detail'
    ];

    var content = null;

    // 根据选择器找到实际的文章内容容器
    for (var i = 0; i < selectors.length; i++) {
        content = document.querySelector(selectors[i]);
        if (content) break;
    }

    // 如果没有找到文章内容容器，则输出错误信息
    if (!content) {
        console.error("无法找到文章内容容器。请检查类名或添加新的选择器。");
        return;
    }

    // 创建目录容器并插入到文章内容前
    var toc = document.getElementById('post-toc');

    // 获取文章中的所有标题元素，并过滤掉 joe-card-describe 容器内的标题
    var headings = Array.from(content.querySelectorAll('h1, h2, h3, h4, h5, h6')).filter(function (heading) {
        return !heading.closest('joe-card-describe'); // 确保标题不在 joe-card-describe 容器内
    });
    
    var tocList = toc.querySelector('ul');

    // 计算目录中最小的标题等级（如h1、h2、h3等）
    let minLevel = 7;
    headings.forEach((heading) => {
        let level = parseInt(heading.tagName.substring(1));
        if (level < minLevel) {
            minLevel = level;
        }
    });

    // 为每个标题创建目录项并插入到目录列表中
    headings.forEach(function (heading, index) {
        var id = 'heading-' + index;
        heading.id = id;

        var li = document.createElement('li');
        var a = document.createElement('a');
        a.href = '#' + id;
        a.textContent = heading.textContent;
        li.appendChild(a);

        var level = parseInt(heading.tagName.substring(1));
        li.style.marginLeft = (level - minLevel) * 1.5 + 'rem';  // 根据标题级别设置缩进
        tocList.appendChild(li);
    });
    // 高亮显示当前的目录项
    // function highlightCurrentHeading() {
    //     let currentHeadingId = null;
    //     const offset = 100;  // 滚动时的偏移量

    //     // 查找当前视口中的标题
    //     for (let i = 0; i < headings.length; i++) {
    //         const rect = headings[i].getBoundingClientRect();
    //         if (rect.top <= offset) {
    //             currentHeadingId = headings[i].id;
    //         } else {
    //             break;
    //         }
    //     }

    //     // 高亮当前标题的目录项
    //     tocList.querySelectorAll('a').forEach(function (a) {
    //         if (a.getAttribute('href').substring(1) === currentHeadingId) {
    //             a.classList.add('active');
    //         } else {
    //             a.classList.remove('active');
    //             a.style.backgroundColor = '';
    //         }
    //     });
    // }

    // 监听滚动事件以更新当前高亮的目录项
    // window.addEventListener('scroll', highlightCurrentHeading);
    // highlightCurrentHeading();  // 初始化高亮

});

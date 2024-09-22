// 获取page-navigator类的元素
const pagination = document.querySelector('.page-navigator');

if (pagination) {
    // 将navigation的类修改为pagination
    pagination.classList.add('pagination', 'justify-content-center');

    // 将pagination的所有<li>子元素的类添加page-item
    const liList = pagination.querySelectorAll('li');
    liList.forEach(li => {
        li.classList.add('page-item');
    });

    // 将page-item的所有<a>子元素的类添加page-link
    const aList = pagination.querySelectorAll('a');
    const spanList = pagination.querySelectorAll('span');
    aList.forEach(a => {
        a.classList.add('page-link');
    });
    spanList.forEach(span => {
        span.classList.add('page-link', 'disabled');
    });
}

const articles = document.getElementById('articles');
// 如果屏幕元素大于992px，则CSS分两栏
function autoSplitColumn() {
    if (window.innerWidth > 991) {
        articles.style.columnCount = 2;
    } else {
        articles.style.removeProperty('column-count');
    }
}
autoSplitColumn()
window.onresize = autoSplitColumn
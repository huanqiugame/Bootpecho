function add_pagination() { 
    // 获取page-navigator类的元素
    const pagination = document.querySelector('.page-navigator');
    const beforePageNavHr = document.getElementById('beforePageNavHr')
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
    } else {
        beforePageNavHr.remove();
    }
}

function add_search_fail_message() {
    // 获取<article>元素
    const article = document.querySelector('article');

    // 如果没有<article>元素，在<hgroup>下添加一个提示信息
    if (!article) {
        const hgroup = document.querySelector('hgroup');
        const message = document.createElement('p');
        message.textContent = '抱歉，没有找到文章内容。';
        hgroup.appendChild(message);
    }
}
document.addEventListener('DOMContentLoaded', function() {
    add_pagination();
    add_search_fail_message();
});
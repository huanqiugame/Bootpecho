// 获取<article>元素
const article = document.querySelector('article');

// 如果没有<article>元素，在<hgroup>下添加一个提示信息
if (!article) {
  const hgroup = document.querySelector('hgroup');
  const message = document.createElement('p');
  message.textContent = '抱歉，没有找到文章内容。';
  hgroup.appendChild(message);
}
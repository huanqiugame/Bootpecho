# Typecho主题Bootpecho v1.0

以Bootstrap 5提供的组件重新思考设计的Typecho主题。

大幅修改自Typecho主题Twenty Twelve（由怡红公子从WordPress版本移植）。

优点：

- 响应式设计。
- 原生支持深色模式。
- 原生支持阅读量统计，使用本地统计。作者：https://www.cnblogs.com/outsrkem/p/12182275.html 。

包内含cdnjs分发的Bootstrap文件，作者：https://getbootstrap.com ，在您的网站底部也会有相关引用。

样式效果请见我的博客：https://leoworld.top 。

![screenshot](screenshot.png)

## 快速开始

1. 点击“Code”，“Download ZIP”下载压缩包。
2. 解压ZIP包，重命名为`bootpecho`。
3. 将`bootpecho`文件夹放入您的网站目录下的`usr/themes`目录，并在Typecho后台启用。

## 半自动更新

通过上述方式下载到副本每一次更新都需要手动删掉和覆盖。由于项目仍处在积极开发阶段，更新可能会较为频繁。您可以考虑使用以下方式下载来便利后续更新体验（使用Git和命令行）：

1. 确认你已经安装[`git`](https://git-scm.com/install)命令行工具。你可以打开在macOS和各Linux发行版上打开终端（Terminal）或者在Windows上打开cmd或Powershell，输入`git -v`查看当前安装的`git`版本。如果提示没有找到命令，请前往官网安装。~~（话说已经装好Typecho的大佬们应该不需要我教怎么安装Git了吧~~
2. 打开你网站目录下的`usr/themes`目录，然后在此处打开终端或powershell。你也可以使用`cd <usr/themes路径>`来完成这一步。
3. 输入`git clone https://github.com/huanqiugame/bootpecho.git`来将本存储库下载到你的电脑上。
4. 想要更新时，再次`cd <usr/themes/bootpecho路径>`，输入`git pull`即可。

这样下载还会将本README文件一并下载到网站主题目录下，方便您查看本主题的其他信息。

---

# 以下为原作者包内的README.md：

### Typecho主题Twenty Twelve v1.2

![screenshot](legacy_screenshot.png)

移植自Wordpress默认主题2012版，纯白双栏极简风格。

###### 更多详见作者博客：https://imnerd.org/twentytwelve-for-typecho.html

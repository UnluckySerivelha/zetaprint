$(function () {
    $("a[href^='tel:']").each(function(){
        $(this).addClass('lptracker_phone');
        $(this).css('cursor', 'pointer');
        $(this).removeAttr('href');
    });
    $("a[href^='tel: ']").each(function(){
        $(this).addClass('lptracker_phone');ц
        $(this).css('cursor', 'pointer');
        $(this).removeAttr('href');
    });
        (function() {
            var projectId = 95499;
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://lpt-crm.online/lpt_widget/out/parser.min.js';
            window.lptWg = window.lptWg || {};
            window.lptWg.projectId = projectId;
            window.lptWg.parser = true;
            document.head.appendChild(script);
        })();
        (function() {
            var projectId = 95499;
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://lpt-crm.online/lpt_widget/kick-widget.js';
            window.lptWg = window.lptWg || {};
            window.lptWg.projectId = projectId;
            window.lptWg.parser = true;
            document.head.appendChild(script);
        })();
});



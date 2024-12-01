; (function ($) {
    $(document).ready(function () {
        const $tabItems = $('.widgetsm-tab-item');
        const $tabContents = $('.widgetsm-tab-content');
        const $connectBtn = $('#widgetsm-connect-btn');
        const $disconnectBtn = $('#widgetsm-discount');
        const $syncBtn = $('#widgetsm-sync');

        // Tab switching functionality
        $tabItems.on('click', function () {
            const index = $tabItems.removeClass('widgetsm-active-tab').index(this);
            $tabContents.hide().eq(index).show();
            $(this).addClass('widgetsm-active-tab');
        });

        // Initially hide all tab contents except the active one
        const activeTabIndex = $tabItems.index($('.widgetsm-active-tab'));
        $tabContents.hide().eq(activeTabIndex).show();

        // Connect Button Functionality
        $connectBtn.on('click', function (e) {
            e.preventDefault();
            window.open(`https://widgetsmaker.com/api/oauth?redirectUrl=${widgetsm.redirectUrl}`, '_self');
        });

        // Disconnect Button Functionality
        $disconnectBtn.on('click', function (e) {
            e.preventDefault();
            if (confirm("Are you sure you want to disconnect?")) {
                performAjaxAction('widgetsm_disconnect_apps', widgetsm.redirectUrl);
            }
        });

        // Sync Data Button Functionality
        $syncBtn.on('click', function (e) {
            e.preventDefault();
            performAjaxAction('widgetsm_sync_apps_data', widgetsm.redirectUrl);
        });

        // Reusable function for AJAX requests
        function performAjaxAction(action, redirectUrl) {
            $.ajax({
                url: widgetsm.ajax_url,
                type: 'POST',
                beforeSend: ()=>{
                    $syncBtn.children().show();
                },
                data: {
                    action: action,
                    nonce: widgetsm.nonce
                },
                success: function (response) {
                    console.log(response);
                    
                    if (response.success) {
                        window.location.replace(redirectUrl);
                    }
                },
                complete: ()=>{
                    $syncBtn.children().hide();
                },
                error: function (xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        }
    });

    /* Copy shortcode of forms from table */
    $(".copiable_wrap").each(function (index, element) {
        $(this).on("click", function (event) {
            let shortcode = $(this).children(".copiable_input").val();           
            navigator.clipboard.writeText(shortcode);
            $(this).children(".tooltip").text("Copied");
            setTimeout(()=>{
                $(this).children(".tooltip").text("Click To Copy");
            },3000);
        });
    });
})(jQuery);
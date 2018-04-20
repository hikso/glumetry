var list;
var Nestable = function () {

    var updateOutput = function (e) {
        list = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            // console.log(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };



    // activate Nestable for list 1
    $('#nestable_list_1').nestable({
        group: 1
    });

    // activate Nestable for list 2
    $('#nestable_list_2').nestable({
        group: 1
    });

    // output initial serialised data
    updateOutput($('#nestable_list_2').data('output', $('#nestable_list_2_output')));

    $('#nestable_list_menu').on('click', function (e) {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    $('#nestable_list_3').nestable();



}();
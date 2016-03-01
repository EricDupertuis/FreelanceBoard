'use strict';

$('#clients-list a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
});
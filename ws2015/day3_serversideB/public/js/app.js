$(document).ready(function() {
    const origin_countries = '<option value="">choose a country</option><option value="AU">AU - Australia</option><option value="BR">BR - Brasil</option><option value="CA">CA - Canada</option><option value="CH">CH - Switzerland</option><option value="CN">CN - China</option><option value="DE">DE - Germany</option><option value="FR">FR - France</option><option value="IN">IN - India</option>';
    $(".addguest").click(function(e){ //on add input button click
        e.preventDefault();

        const wrapper_name = e.target.id + "-n";
        const wrapper_name_next_element_num = $("#" + wrapper_name + ' input').length + 1;
        const wrapper_origin = e.target.id + "-o";
        const wrapper_origin_next_element_num = $("#" + wrapper_origin + ' select').length + 1;

        const index = $(`#${e.target.id}-n input`).length;
        const id = e.target.dataset.id;

        $("#" + wrapper_name).append('<p><input type="text" id="' + wrapper_name + wrapper_name_next_element_num + '" name="option[' + id + '][' + index + '][name]" class="form-control"></p>'); //add input box
        $("#" + wrapper_origin).append('<p><select id="' + wrapper_origin + wrapper_origin_next_element_num + '" name="option[' + id + '][' + index + '][country]" class="form-control">' + origin_countries + '</select></p>'); //add select box
    });
});

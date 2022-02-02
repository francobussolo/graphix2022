$("#trim").mask("#0.0", {reverse: true});
$('#value').mask("#.000");

var route = '/client/ajax';
var id = $("#client_id");

$('#client').typeahead({
    autoSelect: true,
    displayText: function(data){ return data.name},
    afterSelect: function(data){ id.val(data.id) },
    source:  function (term, process) {
        return $.get(route, { term: term }, function (data) {
                return process(data);
            });
        }
});
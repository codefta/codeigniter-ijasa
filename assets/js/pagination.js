$(function(){
    var myTable = ".page-table";
    var myTableBody = myTable + " tbody";
    var myTableRows = myTable + " tr";
    var myTableColumn = myTable + " th";

    function initTable(){
        $(myTableBody).attr("data-pageSize", 4);
        $(myTableBody).attr("data-firstRecord", 0);
        $('#previous').hide();
        $('#next').show();

        paginate(parseInt($(myTableBody).attr("data-firstRecord"), 5),
                parseInt($(myTableBody).attr("data-pageSize"), 10));
    }

    $(myTableColumn).click(function(){
        paginate(parseInt($(myTableBody).attr("data-firstRecord"), 10),
                parseInt($(myTableBody).attr("data-pageSize"), 10));
    });

    $("a.paginate").click(function(e){
        e.preventDefault();
        var tableRows = $(myTableRows);
        var tmpRec = parseInt($(myTableBody).attr("data-firstRecord"), 10);
        var pageSize = parseInt($(myTableBody).attr("data-pageSize"), 10); 

        if($(this).attr("id") == "next"){
            tmpRec += pageSize;
        } else{
            tmpRec -= pageSize;
        }

        if(tmpRec < 0 || tmpRec > tableRows.length) return

        $(myTableBody).attr("data-firstRecord", tmpRec);
        paginate(tmpRec, pageSize);
    });

    var paginate = function(start, size){
        var tableRows = $(myTableRows);
        var end = start + size;

        tableRows.hide();

        tableRows.slice(start, end).show();

        $(".paginate").show();

        if(tableRows.eq(0).is(":visible")) $('#previous').hide();
        if(tableRows.eq(tableRows.length -1 ).is(":visible")) $('#next').hide();
    }

    initTable();


});
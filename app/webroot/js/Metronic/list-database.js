"use strict";
var KTUserListDatatable=function(){
    var t;
    return{
        init:function(){
            t=$("#kt_apps_user_list_datatable").KTDatatable({
                data:{
                    type:"remote",source:{
                        read:{
                            url:"https://keenthemes.com/metronic/tools/preview/api/datatables/demos/default.php"}},
                           
                                footer:!1
                            },
                            sortable:!0,
                            pagination:!0,
                            search:{
                                input:$("#generalSearch"),
                                delay:400
                            },
                            columns:[
                                {
                                    field:"RecordID",
                                    title:"#",
                                    sortable:!1,
                                    width:20,
                                    selector:{
                                        class:"kt-checkbox--solid"
                                    },
                                    textAlign:"center"
                                },
                                {
                                    field:"AgentName",
                                    title:"Número",
                                    width:200,
                             
                                    },{
                                        field:"Country",
                                        title:"Country",
                                        template:function(t){
                                            return t.Country+" "+t.ShipCountry
                                        }
                                    },
                                    {
                                        field:"ShipDate",
                                        title:"Ship Date",
                                        type:"date",
                                        format:"MM/DD/YYYY"
                                    },
                                    {
                                        field:"ShipName",
                                        title:"Company",
                                        width:"auto",
                                        autoHide:!1,
                      },{field:"Status",title:"Status",width:100,template:function(t){
                                                var e={
                                                    1:{
                                                        title:"Pending",
                                                        class:" btn-label-brand"},
                                                        2:{title:"Processing",
                                                        class:" btn-label-danger"},
                                                        3:{
                                                            title:"Success",
                                                            class:" btn-label-success"
                                                        },
                                                        4:{
                                                            title:"Delivered",
                                                            class:" btn-label-success"
                                                        },
                                                        5:{
                                                            title:"Canceled",class:" btn-label-warning"
                                                        },6:{
                                                            title:"Done",class:" btn-label-danger"
                                                        },7:{
                                                            title:"On Hold",class:" btn-label-warning"
                                                        }};
                                                        return'<span class="btn btn-bold btn-sm btn-font-sm '+e[t.Status].class+'">'+e[t.Status].title+"</span>"}
                                                    },
                                                    {
                                                        width:110,
                                                        field:"Type",
                                                        title:"Type",
                                                        autoHide:!1,
                                                        template:function(t){
                                                            var e={
                                                                1:{
                                                                    title:"Online",state:"danger"
                                                                },
                                                                2:
                                                                {title:"Retail",
                                                                state:"primary"
                                                            },
                                                            3:{
                                                                title:"Direct",
                                                                state:"success"}};
                                                                return'<span class="kt-badge kt-badge--'+e[t.Type].state+' kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-'+e[t.Type].state+'">'+e[t.Type].title+"</span>"}},{field:"Actions",width:80,title:"Actions",sortable:!1,autoHide:!1,overflow:"visible",template:function(){return'\t\t\t\t\t\t\t<div class="dropdown">\t\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">\t\t\t\t\t\t\t\t\t<i class="flaticon-more-1"></i>\t\t\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\t<div class="dropdown-menu dropdown-menu-right">\t\t\t\t\t\t\t\t\t<ul class="kt-nav">\t\t\t\t\t\t\t\t\t\t<li class="kt-nav__item">\t\t\t\t\t\t\t\t\t\t\t<a href="#" class="kt-nav__link">\t\t\t\t\t\t\t\t\t\t\t\t<i class="kt-nav__link-icon flaticon2-expand"></i>\t\t\t\t\t\t\t\t\t\t\t\t<span class="kt-nav__link-text">View</span>\t\t\t\t\t\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t\t\t<li class="kt-nav__item">\t\t\t\t\t\t\t\t\t\t\t<a href="#" class="kt-nav__link">\t\t\t\t\t\t\t\t\t\t\t\t<i class="kt-nav__link-icon flaticon2-contract"></i>\t\t\t\t\t\t\t\t\t\t\t\t<span class="kt-nav__link-text">Edit</span>\t\t\t\t\t\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t\t\t<li class="kt-nav__item">\t\t\t\t\t\t\t\t\t\t\t<a href="#" class="kt-nav__link">\t\t\t\t\t\t\t\t\t\t\t\t<i class="kt-nav__link-icon flaticon2-trash"></i>\t\t\t\t\t\t\t\t\t\t\t\t<span class="kt-nav__link-text">Delete</span>\t\t\t\t\t\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t\t\t<li class="kt-nav__item">\t\t\t\t\t\t\t\t\t\t\t<a href="#" class="kt-nav__link">\t\t\t\t\t\t\t\t\t\t\t\t<i class="kt-nav__link-icon flaticon2-mail-1"></i>\t\t\t\t\t\t\t\t\t\t\t\t<span class="kt-nav__link-text">Export</span>\t\t\t\t\t\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t\t</ul>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t'}}]}
                                                                ),
                                                                $("#kt_form_status").on("change",function(){
                                                                    t.search($(this).val().toLowerCase(),
                                                                    "Status")}
                                                                    ),
                                                                    t.on("kt-datatable--on-check kt-datatable--on-uncheck kt-datatable--on-layout-updated",function(e){var a=t.rows(".kt-datatable__row--active").nodes().length;$("#kt_subheader_group_selected_rows").html(a),a>0?($("#kt_subheader_search").addClass("kt-hidden"),$("#kt_subheader_group_actions").removeClass("kt-hidden")):($("#kt_subheader_search").removeClass("kt-hidden"),$("#kt_subheader_group_actions").addClass("kt-hidden"))}),$("#kt_datatable_records_fetch_modal").on("show.bs.modal",function(e){var a=new KTDialog({type:"loader",placement:"top center",message:"Carregando ..."});a.show(),setTimeout(function(){a.hide()},1e3);for(var n=t.rows(".kt-datatable__row--active").nodes().find('.kt-checkbox--single > [type="checkbox"]').map(function(t,e){return $(e).val()}),s=document.createDocumentFragment(),l=0;l<n.length;l++){var i=document.createElement("li");i.setAttribute("data-id",n[l]),i.innerHTML="Selected record ID: "+n[l],s.appendChild(i)}$(e.target).find("#kt_apps_user_fetch_records_selected").append(s)}).on("hide.bs.modal",function(t){$(t.target).find("#kt_apps_user_fetch_records_selected").empty()}),$("#kt_subheader_group_actions_status_change").on("click","[data-toggle='status-change']",function(){var e=$(this).find(".kt-nav__link-text").html(),a=t.rows(".kt-datatable__row--active").nodes().find('.kt-checkbox--single > [type="checkbox"]').map(function(t,e){return $(e).val()});a.length>0&&swal.fire({buttonsStyling:!1,html:"Are you sure to update "+a.length+" selected records status to "+e+" ?",type:"info",confirmButtonText:"Yes, update!",confirmButtonClass:"btn btn-sm btn-bold btn-brand",showCancelButton:!0,cancelButtonText:"No, cancel",cancelButtonClass:"btn btn-sm btn-bold btn-default"}).then(function(t){t.value?swal.fire({title:"Deleted!",text:"Your selected records statuses have been updated!",type:"success",buttonsStyling:!1,confirmButtonText:"OK",confirmButtonClass:"btn btn-sm btn-bold btn-brand"}):"cancel"===t.dismiss&&swal.fire({title:"Cancelled",text:"You selected records statuses have not been updated!",type:"error",buttonsStyling:!1,confirmButtonText:"OK",confirmButtonClass:"btn btn-sm btn-bold btn-brand"})})}),$("#kt_subheader_group_actions_delete_all").on("click",function(){var e=t.rows(".kt-datatable__row--active").nodes().find('.kt-checkbox--single > [type="checkbox"]').map(function(t,e){return $(e).val()});e.length>0&&swal.fire({buttonsStyling:!1,text:"Are you sure to delete "+e.length+" selected records ?",type:"danger",confirmButtonText:"Yes, delete!",confirmButtonClass:"btn btn-sm btn-bold btn-danger",showCancelButton:!0,cancelButtonText:"No, cancel",cancelButtonClass:"btn btn-sm btn-bold btn-brand"}).then(function(t){t.value?swal.fire({title:"Deleted!",text:"Your selected records have been deleted! :(",type:"success",buttonsStyling:!1,confirmButtonText:"OK",confirmButtonClass:"btn btn-sm btn-bold btn-brand"}):"cancel"===t.dismiss&&swal.fire({title:"Cancelled",text:"You selected records have not been deleted! :)",type:"error",buttonsStyling:!1,confirmButtonText:"OK",confirmButtonClass:"btn btn-sm btn-bold btn-brand"})})}),t.on("kt-datatable--on-layout-updated",function(){})}}}();KTUtil.ready(function(){KTUserListDatatable.init()});
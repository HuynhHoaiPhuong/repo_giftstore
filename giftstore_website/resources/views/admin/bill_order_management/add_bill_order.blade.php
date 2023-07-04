@extends('admin/admin_layout')

@section('title','Nhập hàng')

@section('header')
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- bootstrap-css -->
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}" >

  <!-- Custom CSS -->
  <link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
  <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet"/>

  <!-- Font-Awesome-->
  <link rel="stylesheet" href="{{asset('admin/css/font.css')}}" type="text/css"/>
  <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet"> 

  <link rel="stylesheet" href="{{asset('admin/css/morris.css')}}" type="text/css"/>
  <link rel="stylesheet" href="{{asset('admin/css/monthly.css')}}">

  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <script src="{{asset('admin/js/jquery2.0.3.min.js')}}"></script>
  <script src="{{asset('admin/js/raphael-min.js')}}"></script>
  <script src="{{asset('admin/js/morris.js')}}"></script>
@endsection

@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
        <header class="panel-heading">
            Nhập hàng
        </header>
        <form role="form" action="{{route('save-bill-order')}}" method="POST">
        @csrf
            <div class="option-product-content">
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <select id="addIdProviderProduct" name="id_provider" class="input-sm form-control w-sm inline v-middle">
                            <option value="">Chọn nhà cung cấp</option>
                            @foreach($providers as $key => $pvd)
                                <option value="{{$pvd->id_provider}}">{{$pvd->name}}</option>
                            @endforeach
                        </select>
                        <select  id="addCategoryProduct" class="input-sm form-control w-sm inline v-middle">
                            <option value="">Chọn danh mục</option>
                            @foreach($categories as $key => $category)
                                <option value="{{$category->id_category}}">{{$category->name}}</option>
                            @endforeach
                        </select>           
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="width:20px;">STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên</th>
                            <th>Nhà sản xuất</th>
                            <th>Danh mục</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody class="append-product">
                        @if($products != [])
                        <?php $i = 1; ?>
                        @foreach($products as $key => $product)
                        <tr class="item-product">
                            <td>{{$i++}}</td>
                            @if($product->photo != 'noimage.png' && $product->photo != '')
                            <td><img src="../upload/product/{{ $product->photo }}" alt="{{$product->name}}" width="40"></td>
                            @else
                            <td><img src="../admin/images/noimage.png" alt="noimage.png" width="40"></td>
                            @endif
                            <td>{{$product->name}}</td>
                            <td>{{$product->provider->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{number_format($product->price, 0, ',','.')}}đ</td>
                            <td><input type="number" min="1" value="1" class="quantity-select form-control"></td>
                            <td><button type="button" data-q="1" data-id="{{$product->id_product}}" class="add-pro btn btn-info">Thêm</button></td>
                        </tr>
                        @endforeach
                        @else
                            <tr class="odd "><td valign="top" colspan="12" class="text-center dataTables_empty">Chưa có dữ liệu</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="product-input-content">
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <label>Sản phẩm đã chọn mua:</label>
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên</th>
                            <th>Nhà sản xuất</th>
                            <th>Danh mục</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody class="append-pro-selected">
                            <tr class="odd "><td valign="top" colspan="12" class="text-center dataTables_empty">Chưa có dữ liệu</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="m-b-xs">Kho hàng:</label>
                        <select  name="id_warehouse" class="form-control   m-bot15">
                            @foreach($warehouses as $key => $value)
                                <option value="{{$value->id_warehouse}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="m-b-xs">Hình thức thanh toán:</label>
                        <select  name="id_payment" class="form-control w-sm  m-bot15">
                            @foreach($payments as $key => $value)
                                <option value="{{$value->id_payment}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="m-b-xs">Tổng tiền:</label>
                        <span data-total="0" id="total-price">0</span>đ
                    </div>
                    <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-info">Thanh toán</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

<!-- JavaScript -->
@section('java-script')
  <script src="{{asset('admin/js/bootstrap.js')}}"></script>
  <script src="{{asset('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('admin/js/scripts.js')}}"></script>
  <script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
  <script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
  <script src="{{asset('admin/js/jquery.scrollTo.js')}}"></script>
  <!-- morris JavaScript -->  
  <script>
    $(document).ready(function() {
        number_format = function(number, decimals, dec_point, thousands_sep) {
            number = number.toFixed(decimals);

            var nstr = number.toString();
            nstr += '';
            x = nstr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? dec_point + x[1] : '';
            var rgx = /(\d+)(\d{3})/;

            while (rgx.test(x1))
                x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');

            return x1 + x2;
        }

          //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        $('#addIdProviderProduct').on('change',function(){
            
            var idprvd = $('#addIdProviderProduct').val();
            if(idprvd != ''){
                $('#addCategoryProduct').removeClass('hide');
                $('#addCategoryProduct').addClass('inline');
            }else{
                $('#addCategoryProduct').removeClass('inline');
                $('#addCategoryProduct').addClass('hide');
            }
        });

        $('.quantity-select').on('change', function(){

            var quantity = $(this).val();
            if(quantity > 0)
                $(this).parent('td').parent('.item-product').find('.add-pro').attr('data-q',quantity);
            else{
                $(this).parent('td').parent('.item-product').find('.add-pro').attr('data-q', 1);
                $(this).val(1);
            }
        });

        $('.add-pro').on('click', function() {
          $id_product = $(this).attr('data-id');
          var quantity = $(this).attr('data-q');
          var totalold = $('#total-price').attr('data-total');
          if($('.append-pro-selected').find('tr').hasClass('item-product'+$id_product)){
            var totalq = parseInt(parseInt($('.item-product'+$id_product).find('.quantity-selected').val()) + parseInt(quantity));
            $('.item-product'+$id_product).find('.quantity-selected').val(totalq);
            var pricetmp = $('.item-product'+$id_product).find('.price-pro input').val();
            var totalnew = parseInt(pricetmp*quantity) + parseInt(totalold);
            $('#total-price').attr('data-total',totalnew);
            $('#total-price').html(number_format(parseInt(totalnew), 0, ',','.'));
          }
          else{
            $.ajax({
                type: 'GET',
                url: '/api/products/get-product-by-id/' + $id_product,
                success: function(data) {
                    var product = data.data;
                    var apstr = '<tr class="item-product item-product'+product.id_product+'"> <input type="hidden" name="dataProduct['+product.id_product+'][id_product]" value="'+product.id_product+'">';
                    if(product.photo != 'noimage.png' && product.photo != ''){ 
                        apstr += '<td><img src="../upload/product/'+product.photo+'" alt="'+product.name+'" width="40"></td>'
                    }else{
                        apstr += '<td><img src="../admin/images/noimage.png" alt="noimage.png" width="40"></td>'
                    }
                    apstr += '<td>'+product.name+'</td>\
                                    <td>'+product.provider.name+'</td>\
                                    <td>'+product.category.name+'</td>\
                                    <td class="price-pro">'+number_format(product.price, 0, ',','.')+'đ<input type="hidden" name="dataProduct['+product.id_product+'][price]" value="'+product.price+'"> </td>\
                                    <td><input type="number" value="'+quantity+'" name="dataProduct['+product.id_product+'][quantity]" class="quantity-selected form-control" readonly></td>\
                                    <td>\
                                        <a data-id="'+product.id_product+'" onclick="deletePro()" class="removeProduct show text-center active styling-edit" title="Xóa">\
                                            <i class="fa fa-times text-danger text"></i>\
                                        </a>\
                                    </td>\
                                </tr>';
                    $('.append-pro-selected').append(apstr);
                    $('.append-pro-selected .dataTables_empty').remove();
                    var totalnew = parseInt(product.price*quantity) + parseInt(totalold);
                    $('#total-price').attr('data-total',totalnew);
                    $('#total-price').html(number_format(parseInt(totalnew), 0, ',','.'));
                },
                error: function() {

                }
            });
          }
        });
    });
    
    function deletePro(){
        var id_product = $(this).attr('data-id');
        var quantity = parseInt($('.item-product'+$id_product).find('.quantity-selected').val());
        var totalold = $('#total-price').attr('data-total');
        var pricetmp = $('.item-product'+$id_product).find('.price-pro input').val();
        var totalnew = parseInt(totalold) - parseInt(pricetmp*quantity);
        $('#total-price').attr('data-total',totalnew);
        $('#total-price').html(number_format(parseInt(totalnew), 0, ',','.'));
        $('.item-product'+$id_product).remove();
        if(!$('.append-pro-selected').find('tr').hasClass('item-product'))
            $('.append-pro-selected').append('<tr class="odd "><td valign="top" colspan="12" class="text-center dataTables_empty">Chưa có dữ liệu</td></tr>');
    };
  </script>
@endsection
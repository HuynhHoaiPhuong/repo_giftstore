@if ($pagination['lastPage'] > 1)
  @if($pagination['currentPage'] >= 1 && $pagination['currentPage'] <= $pagination['endPage'])
  <div class="col-12 pb-1">
      <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center mb-3">
              
              <!-- Hiển thị liên kết đến trang đầu tiên -->
              @if ($pagination['startPage'] > 1)
              <li class="page-item"><a class="page-link" href="?page=1">Trang đầu</a></li>
              @endif
          
              <!-- Hiển thị các liên kết đến trang trước trang hiện tại -->
              @if ($pagination['currentPage'] > 1)
              <li class="page-item">
                  <a class="page-link" href="?page={{ $pagination['currentPage'] - 1 }}" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span id="PreviousPage" class="sr-only">Previous</span>
                  </a>
              </li>
              @endif
              
              <!-- Hiển thị các liên kết đến các trang lùi -->
              @for ($page = $pagination['startPage']; $page < $pagination['currentPage']; $page++)
              <li class="page-item"><a class="page-link" href="?page={{ $page }}">{{ $page }}</a></li>
              @endfor
              
              {{-- Trang hiện tại --}}
              <li class="page-item active"><a class="page-link">{{ $pagination['currentPage'] }}</a></li>

              <!-- Hiển thị các liên kết đến các trang tiếp theo -->
              @for ($page = $pagination['currentPage'] + 1; $page <= $pagination['endPage']; $page++)
              <li class="page-item"><a class="page-link" href="?page={{ $page }}">{{ $page }}</a></li>
              @endfor

              <!-- Hiển thị các liên kết đến trang tiếp theo trang hiện tại -->
              @if ($pagination['currentPage'] < $pagination['lastPage'])
              <li class="page-item">
                  <a class="page-link" href="?page={{ $pagination['currentPage'] + 1 }}" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span id="NextPage" class="sr-only">Next</span>
                  </a>
              </li>
              @endif

              <!-- Hiển thị liên kết đến trang cuối cùng -->
              @if ($pagination['endPage'] < $pagination['lastPage'])
              <li class="page-item"><a class="page-link" href="?page={{ $pagination['lastPage'] }}">Trang cuối</a></li>
              @endif
          </ul>
      </nav>
  </div>
  @else
  <div class="col-12 pb-1">
      <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center mb-3">
              <li><span style="margin-right: 5px; font-weight: bold;">Không có dữ liệu, quay lại -  </span>
                  <label class="page-item"><a class="page-link btn btn-primary" href="?page=1" style="color: #fff;">Trang đầu</a></label>
              </li>
          </ul>
      </nav>
  </div> 
  @endif
@endif

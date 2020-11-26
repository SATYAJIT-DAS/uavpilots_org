<section class="footer">
    <footer class="page-footer font-small pt-4 bg-secondary">
    <hr class="d-block d-md-none">
    <div class="pt-5">
        @guest
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h5 class="mb-1 text-light">Register for free</h5>
                </li>
                <li class="list-inline-item pb-5">
                    <a href="{{ route('register') }}" class="btn w-sm mb-1 btn-rounded btn-outline-success">Sign up!</a>
                </li>
            </ul>
        @endguest

          <hr class="d-block d-md-none">
          <ul class="list-unstyled list-inline text-center">
            <li class="list-inline-item">
              @if (!empty($pageSetting->fb_link))
              <a class="btn-floating btn-fb mx-1" href="{{ $pageSetting->fb_link }}">
              @else
              <a class="btn-floating btn-fb mx-1" href="">
              @endif
                  <i data-feather='facebook'></i>
              </a>
            </li>
            <li class="list-inline-item">
              @if (!empty($pageSetting->twitter_link))
              <a class="btn-floating btn-tw mx-1" href="{{ $pageSetting->twitter_link }}">
              @else
              <a class="btn-floating btn-tw mx-1" href="">
              @endif

                  <i data-feather='twitter'></i>
              </a>
            </li>
            <li class="list-inline-item">
              @if (!empty($pageSetting->instragram_link))
              <a class="btn-floating btn-gplus mx-1" href="{{ $pageSetting->instragram_link }}">
              @else
              <a class="btn-floating btn-gplus mx-1" href="">
              @endif
                  <i data-feather='instagram'></i>
              </a>
            </li>
          </ul>
    </div>

    <div class="footer-copyright text-center py-3">© {{ date('Y') }} Copyright:
    <a class="text-white" href="{{ route('homepage') }}"> {{config('app.name')}}</a>
    </div>
  </footer>
</section>
<a href="#" id="scroll" style="display: none;"><span></span></a>

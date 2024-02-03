@extends('layout.master')

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Grid</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item"> Ui Kits</li>
            <li class="breadcrumb-item active">Grid</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid grid-wrrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Grid Options</h4><span>Bootstrap grid allows building an equal height flexbile blocks easily</span>
          </div>
          <div class="card-body">
            <p>While Bootstrap uses <code>em </code>or <code>rem </code>for defining most sizes, <code>px</code> are used for grid breakpoints and container widths. This is because the viewport width is in pixels and does not change with the <a href="#">font size</a>.</p>
            <div class="table-responsive theme-scrollbar">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th class="text-center">Extra small<br><small>&lt;576px</small></th>
                    <th class="text-center">Small<br><small>≥576px</small></th>
                    <th class="text-center">Medium<br><small>≥768px</small></th>
                    <th class="text-center">Large<br><small>≥992px</small></th>
                    <th class="text-center">Extra large<br><small>≥1200px</small></th>
                    <th class="text-center">Extra extra large<br><small class="digits">≥1400px</small></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="text-nowrap" scope="row">Grid behavior</th>
                    <td>Horizontal at all times</td>
                    <td colspan="5">Collapsed to start, horizontal above breakpoints</td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row">Max container width</th>
                    <td>None (auto)</td>
                    <td>540px</td>
                    <td>720px</td>
                    <td>960px</td>
                    <td>1140px</td>
                    <td>1320px</td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row">Class prefix</th>
                    <td><code>.col-</code></td>
                    <td><code>.col-sm-</code></td>
                    <td><code>.col-md-</code></td>
                    <td><code>.col-lg-</code></td>
                    <td><code>.col-xl-</code></td>
                    <td><code>.col-xxl-</code></td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row"># of columns</th>
                    <td colspan="6">12</td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row">Gutter width</th>
                    <td colspan="6">1.5rem (.75rem on left and right)</td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row">Nestable</th>
                    <td colspan="6">Yes</td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row">Offsets</th>
                    <td colspan="6">Yes</td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row">Column ordering</th>
                    <td colspan="6">Yes</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Grid Column</h4>
          </div>
          <div class="card-body grid-showcase">
            <p>Using a single set of <code>.col-md-*</code> grid classes, you can create a basic grid system that starts out stacked on mobile devices and tablet devices (the extra small to small range) before becoming horizontal on desktop (medium) devices. Place grid columns within any <code>.row</code>.</p>
            <div class="row">
              <div class="col-md-1 text-center"><span>col-md-1</span></div>
              <div class="col-md-2 text-center"><span>col-md-2</span></div>
              <div class="col-md-2 text-center"><span>col-md-2</span></div>
              <div class="col-md-3 text-center"><span>col-md-3</span></div>
              <div class="col-md-4 text-center"><span>col-md-4</span></div>
              <div class="col-md-5 text-center"><span>col-md-5</span></div>
              <div class="col-md-7 text-center"><span>col-md-7</span></div>
              <div class="col-md-6 text-center"><span>col-md-6</span></div>
              <div class="col-md-6 text-center"><span>col-md-6</span></div>
              <div class="col-md-8 text-center"><span>col-md-8</span></div>
              <div class="col-md-4 text-center"><span>col-md-4</span></div>
              <div class="col-md-9 text-center"><span>col-md-9</span></div>
              <div class="col-md-3 text-center"><span>col-md-3</span></div>
              <div class="col-md-10 text-center"><span>col-md-10</span></div>
              <div class="col-md-2 text-center"><span>col-md-2</span></div>
              <div class="col-md-12 text-center"><span>col-md-12</span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Setting one column width</h4>
          </div>
          <div class="card-body grid-showcase">
            <p>Auto-layout for flexbox grid columns also means you can set the width of one column and have the sibling columns automatically resize around it. You may use predefined grid classes (as shown below), grid mixins, or inline widths. Note that the other columns will resize no matter the width of the center column.</p>
            <div class="row">
              <div class="col"><span>1 of 3</span></div>
              <div class="col-6"><span>2 of 3 (wider)</span></div>
              <div class="col"><span> 3 of 3</span></div>
            </div>
            <div class="row">
              <div class="col"><span>1 of 3</span></div>
              <div class="col-5"><span> 2 of 3 (wider)</span></div>
              <div class="col"><span>3 of 3</span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Vertical alignment</h4>
          </div>
          <div class="card-body grid-showcase grid-align">
            <p>Use flexbox alignment utilities to vertically and horizontally align columns.</p>
            <div class="row">
              <div class="col align-self-start"><span>One of three columns</span></div>
              <div class="col align-self-center"><span>One of three columns</span></div>
              <div class="col align-self-end"><span>One of three columns</span></div>
            </div>
            <div class="row align-items-start">
              <div class="col"><span>One of three columns</span></div>
              <div class="col"><span>One of three columns</span></div>
              <div class="col"><span>One of three columns</span></div>
            </div>
            <div class="row align-items-center">
              <div class="col"><span>One of three columns</span></div>
              <div class="col"><span>One of three columns</span></div>
              <div class="col"><span>One of three columns</span></div>
            </div>
            <div class="row align-items-end">
              <div class="col"><span>One of three columns</span></div>
              <div class="col"><span>One of three columns</span></div>
              <div class="col"><span>One of three columns</span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Horizontal alignment</h4>
          </div>
          <div class="card-body grid-showcase grid-align">
            <p>Use flexbox alignment utilities to vertically and horizontally align columns.</p>
            <div class="row justify-content-start">
              <div class="col-4"><span>One of two columns</span></div>
              <div class="col-4"><span>One of two columns</span></div>
            </div>
            <div class="row justify-content-center">
              <div class="col-4"><span>One of two columns</span></div>
              <div class="col-4"><span>One of two columns</span></div>
            </div>
            <div class="row justify-content-end">
              <div class="col-4"><span>One of two columns</span></div>
              <div class="col-4"><span>One of two columns</span></div>
            </div>
            <div class="row justify-content-around">
              <div class="col-4"><span>One of two columns</span></div>
              <div class="col-4"><span>One of two columns</span></div>
            </div>
            <div class="row justify-content-between">
              <div class="col-4"><span>One of two columns</span></div>
              <div class="col-4"><span>One of two columns</span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Nesting Column</h4>
          </div>
          <div class="card-body grid-showcase">
            <p>Use flexbox alignment utilities to vertically and horizontally align columns.</p>
            <div class="row">
              <div class="col-sm-9"><span>Level 1: .col-sm-9</span>
                <div class="row">
                  <div class="col-8 col-sm-6"><span>Level 2: .col-8 .col-sm-6</span></div>
                  <div class="col-4 col-sm-6"><span>Level 2: .col-4 .col-sm-6</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Order</h4>
          </div>
          <div class="card-body grid-showcase">
            <p>Use <code>.order-</code> classes for controlling the <strong>visual order</strong> of your content. These classes are responsive, so you can set the <code>order</code> by breakpoint (e.g., <code>.order-1.order-md-2</code>). Includes support for <code>1</code> through <code>12</code> across all five grid tiers.</p>
            <div class="row">
              <div class="col"><span>First, but unordered</span></div>
              <div class="col order-12"><span>Second, but last</span></div>
              <div class="col order-1"><span>Third, but first</span></div>
            </div>
            <div class="row">
              <div class="col order-last"><span>First, but last</span></div>
              <div class="col"><span>Second, but unordered</span></div>
              <div class="col order-first"><span>Third, but first</span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Offset</h4>
          </div>
          <div class="card-body grid-showcase">
            <p>Move columns to the right using <code>.offset-md-*</code> classes. These classes increase the left margin of a column by <code>*</code> columns. For example, <code>.offset-md-4</code> moves <code>.col-md-4</code> over four columns.</p>
            <div class="row">
              <div class="col-md-4"><span>.col-md-4</span></div>
              <div class="col-md-4 offset-md-4"><span>.col-md-4 .offset-md-4</span></div>
            </div>
            <div class="row">
              <div class="col-md-3 offset-md-3"><span>.col-md-3 .offset-md-3</span></div>
              <div class="col-md-3 offset-md-3"><span>.col-md-3 .offset-md-3</span></div>
            </div>
            <div class="row">
              <div class="col-md-6 offset-md-3"><span>.col-md-6 .offset-md-3</span></div>
            </div>
            <div class="row">
              <div class="col-sm-5 col-md-6"><span>.col-sm-5 .col-md-6</span></div>
              <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0"><span>.col-sm-5 .offset-sm-2 .col-md-6 .offset-md-0</span></div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-6"><span>.col-sm-6 .col-md-5 .col-lg-6</span></div>
              <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0"><span>.col-sm-6 .col-md-5 .offset-md-2 .col-lg-6 .offset-lg-0</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   
@endsection

@section('scripts')
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>   
@endsection
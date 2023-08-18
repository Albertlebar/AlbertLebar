@extends('frontend.layouts.master')
@section('title', 'Size Guide')
@section('content')
<style type="text/css">
    .page {
  /*padding: 50px 80px;*/
  margin: auto;
  background: white;
  box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.6);
  max-width: 800px;
  min-width: 500px;
}

#terms-and-conditions .circle {
    line-height: 500px;
    border-radius: 50%;
    border: 1px solid #fff;
    font-size: 50px;
    color: #fff;
    /*padding: 15px;*/
    font: 10px Santral-Medium;
    text-align: center;
    /*background: #000*/
  }

  thead tr th{
    text-align: center; 
  }
  tbody tr td{
    text-align: center;
    color: white;
  }

#terms-and-conditions {
  font-size: 14px; // default

  h1 {
    font-size: 34px;
  }
  
  ol {
    counter-reset: item;
  }

  li {
    display: block;
    margin: 20px 0;
    position: relative;
  }
  
  li:before {
    position: absolute;
    top: 0;
    margin-left: -50px;
    color: magenta;
    content: counters(item, ".") "    ";
    counter-increment: item;
  }
}
</style>
  <div class="shop-main-wrapper section-padding page" style="background: #f195ab;">
  <div id="terms-and-conditions" style="color: white;">
    <h1 style="text-align: center;">Ring Size Guide</h1>
    <ol>
      <li type="none">
        <b>Measure with a ring</b>
        <ol type="1">
          <li>
            Take the ring you would like to measure.
          </li>
          <li>
            Place it flat on the top of the black circles.
          </li>
          <li>
            Go from the smallest circle until the black area fills up the inside of the ring entirely.
          </li>
        </ol>
      </li>
    </ol>
    <div class="ml-5 mb-2 d-flex">
      <div class="circle" style="padding: 15px;width: 49.36px;height: 49.36px;">41</div> 
      <div class="circle ml-4" style="padding: 16px;width: 50.57px;height: 50.57px;">42</div> 
      <div class="circle ml-4" style="padding: 16px;width: 51.74px;height: 51.74px;">43</div> 
      <div class="circle ml-4" style="padding: 17px;width: 52.95px;height: 52.95px;">44</div> 
      <div class="circle ml-4" style="padding: 17px;width: 54.16px;height: 54.16px;">45</div> 
      <div class="circle ml-4" style="padding: 17px;width: 55.37px;height: 55.37px;">46</div> 
      <div class="circle ml-4" style="padding: 17px;width: 56.57px;height: 56.57px;">47</div> 
      <div class="circle ml-4" style="padding: 17px;width: 57.78px;height: 57.78px;">48</div> 
      <div class="circle ml-4" style="padding: 17px;width: 58.99px;height: 58.99px;">49</div> 
    </div>
    <div class="ml-5 mb-2 d-flex">
      <div class="circle" style="padding: 17px;width: 60.17px;height: 60.17px;">50</div> 
      <div class="circle ml-4" style="padding: 17px;width: 61.37px;height: 61.37px;">51</div> 
      <div class="circle ml-4" style="padding: 17px;width: 62.58px;height: 62.58px;">52</div> 
      <div class="circle ml-4" style="padding: 17px;width: 16.88mm;height: 16.88mm;">53</div>
      <div class="circle ml-4" style="padding: 23px;width: 17.20mm;height: 17.20mm;">54</div>
      <div class="circle ml-4" style="padding: 23px;width: 17.52mm;height: 17.52mm;">55</div>
      <div class="circle ml-4" style="padding: 24px;width: 17.83mm;height: 17.83mm;">56</div>
      <div class="circle ml-4" style="padding: 25px;width: 18.15mm;height: 18.15mm;">57</div>
    </div>
    <div class="ml-5 mb-2 d-flex">
      <div class="circle" style="padding: 25px;width: 18.47mm;height: 18.47mm;">58</div>
      <div class="circle ml-4" style="padding: 26px;width: 18.79mm;height: 18.79mm;">59</div>
      <div class="circle ml-4" style="padding: 26px;width: 19.11mm;height: 19.11mm;">60</div>
      <div class="circle ml-4" style="padding: 27px;width: 19.43mm;height: 19.43mm;">61</div>
      <div class="circle ml-4" style="padding: 28px;width: 19.75mm;height: 19.75mm;">62</div>
      <div class="circle ml-4" style="padding: 28px;width: 20.06mm;height: 20.06mm;">63</div>
      <div class="circle ml-4" style="padding: 29px;width: 20.38mm;height: 20.38mm;">64</div>
    </div>
    <div class="ml-3 d-flex">
      <div class="circle" style="padding: 30px;width: 20.70mm;height: 20.70mm;">65</div>
      <div class="circle ml-3" style="padding: 30px;width: 21.02mm;height: 21.02mm;">66</div>
      <div class="circle ml-3" style="padding: 31px;width: 21.34mm;height: 21.34mm;">67</div>
      <div class="circle ml-3" style="padding: 32px;width: 21.66mm;height: 21.66mm;">68</div>
      <div class="circle ml-3" style="padding: 33px;width: 21.97mm;height: 21.97mm;">69</div>
      <div class="circle ml-3" style="padding: 35px;width: 22.29mm;height: 22.29mm;">70</div>
      <div class="circle ml-3" style="padding: 36px;width: 22.61mm;height: 22.61mm;">71</div>
      <div class="circle ml-3" style="padding: 37px;width: 22.93mm;height: 22.93mm;">72</div>
    </div>
    <table id="manage_all" class="mt-5 align-middle mb-0 table table-striped">
        <thead>
          <tr>
              <th>Measure(mm)</th>
              <th>European Ring Size</th>
              <th>UK & USA Ring Size</th>
              <th>Japanese Ring Size</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>13.06</td>
            <td>41</td>
            <td>1 3/4</td>
            <td>1</td>
          </tr>
          <tr>
            <td>13.38</td>
            <td>42</td>
            <td>2 1/4</td>
            <td>2</td>
          </tr>
          <tr>
            <td>13.69</td>
            <td>43</td>
            <td>2 1/2</td>
            <td>3</td>
          </tr>
          <tr>
            <td>14.01</td>
            <td>44</td>
            <td>3</td>
            <td>4</td>
          </tr>
          <tr>
            <td>14.33</td>
            <td>45</td>
            <td>3 1/4</td>
            <td>5</td>
          </tr>
          <tr>
            <td>14.65</td>
            <td>46</td>
            <td>3 3/4</td>
            <td>6</td>
          </tr><tr>
            <td>14.97</td>
            <td>47</td>
            <td>4</td>
            <td>7</td>
          </tr><tr>
            <td>15.29</td>
            <td>48</td>
            <td>4 1/2</td>
            <td>8</td>
          </tr><tr>
            <td>15.61</td>
            <td>49</td>
            <td>4 3/4</td>
            <td>9</td>
          </tr><tr>
            <td>15.92</td>
            <td>50</td>
            <td>5 1/4</td>
            <td>10</td>
          </tr><tr>
            <td>16.24</td>
            <td>51</td>
            <td>5 3/4</td>
            <td>11</td>
          </tr><tr>
            <td>16.56</td>
            <td>52</td>
            <td>6</td>
            <td>12</td>
          </tr><tr>
            <td>16.88</td>
            <td>53</td>
            <td>6 1/4</td>
            <td>13</td>
          </tr><tr>
            <td>17.20</td>
            <td>54</td>
            <td>6 3/4</td>
            <td>14</td>
          </tr><tr>
            <td>17.52</td>
            <td>55</td>
            <td>7 1/4</td>
            <td>15</td>
          </tr><tr>
            <td>17.83</td>
            <td>56</td>
            <td>7 1/2</td>
            <td>16</td>
          </tr><tr>
            <td>18.15</td>
            <td>57</td>
            <td>8</td>
            <td>17</td>
          </tr><tr>
            <td>18.47</td>
            <td>58</td>
            <td>8 1/4</td>
            <td>18</td>
          </tr><tr>
            <td>18.79</td>
            <td>59</td>
            <td>8 3/4</td>
            <td>19</td>
          </tr>
          <tr>
            <td>19.11</td>
            <td>60</td>
            <td>9</td>
            <td>20</td>
          </tr>
          <tr>
            <td>19.43</td>
            <td>61</td>
            <td>9 1/2</td>
            <td>21</td>
          </tr>
          <tr>
            <td>19.75</td>
            <td>62</td>
            <td>10</td>
            <td>22</td>
          </tr>
          <tr>
            <td>20.06</td>
            <td>63</td>
            <td>10 1/4</td>
            <td>23</td>
          </tr>
          <tr>
            <td>20.38</td>
            <td>64</td>
            <td>10 3/4</td>
            <td>24</td>
          </tr>
          <tr>
            <td>20.70</td>
            <td>65</td>
            <td>11</td>
            <td>25</td>
          </tr>
          <tr>
            <td>21.02</td>
            <td>66</td>
            <td>11 1/2</td>
            <td>26</td>
          </tr>
          <tr>
            <td>21.34</td>
            <td>67</td>
            <td>11 3/4</td>
            <td>27</td>
          </tr>
          <tr>
            <td>21.66</td>
            <td>68</td>
            <td>12 1/2</td>
            <td>28</td>
          </tr>
          <tr>
            <td>21.97</td>
            <td>69</td>
            <td>12 1/2</td>
            <td>29</td>
          </tr>
          <tr>
            <td>22.29</td>
            <td>70</td>
            <td>13</td>
            <td>30</td>
          </tr>
          <tr>
            <td>22.61</td>
            <td>71</td>
            <td>13 1/4</td>
            <td>31</td>
          </tr>
          <tr>
            <td>22.93</td>
            <td>72</td>
            <td>13 3/4</td>
            <td>32</td>
          </tr>
        </tbody>
    </table>
  </div><!--  end #terms-and-conditions  -->
</div><!--  end .page  -->
@endsection
@push('script')
<script type="text/javascript">
// banner hight
$(document).ready(function() {

    // $(document).on("change", "#item_size", function(e) {
    //     e.preventDefault();
    //     var item_type = $(this).val();
    //     alert(item_type);
    // });
    var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight - 60);
     $(window).resize(function(){
    var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight - 60);
    // console.log(banerHeight);

    });  
});
</script>

@endpush

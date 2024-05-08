<?php
defined( 'ABSPATH' ) || exit;
$output = home_url( add_query_arg( NULL, NULL ) );
$back = str_replace("&sub_page=add", "",$output);
?>
<a class="back-btn" href="<?php echo $back;  ?>" > &lt; Back</a>
<div class="row">
    <div class="col-6">
        <div class="">
            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
            <label for="vehicle1"> Active</label><br>
        </div>
        <div class="">
            <h4>Product Rule</h4>
            <div class="container">
                <table class="table">
                    <tr class="first-section">
                        <td>
                            <input type="checkbox" id="" name="" value=""><br>
                            <input type="checkbox" id="" name="" value="">
                        </td>
                        <td>
                            <select class="form-control" name="product_price" id="Product price">
                                <option selected value="">Product Price</option>
                                <option value="">Cart Price</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="" id="">
                                <option selected value="">Greater Than</option>
                                <option value="">Less Than</option>
                            </select>
                        </td>
                        <td>
                            <input class="form-control text-center" type="number" step="0.1" id="" name="" value="23.05">

                        </td>
                        <td></td>
                    </tr>
                </table>
                <div class="add-btn">
                    <button class="pointer" type="button" onclick="addSection()">Add</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="flex containt-right">
            <label for="">priority</label>
            <input type="text" class="form-control" id="priority" placeholder="" />
        </div>
    </div>
</div>



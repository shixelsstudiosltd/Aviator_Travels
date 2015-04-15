<style>
    .dep_list_id{  
        z-index: 99999;
    }
    .dep_list_outcome{
        width: 334px;   
        z-index: 9999;
/*        height: 600px;
        background: black;*/
    }
    .dep_list_outcome li{
        display: block;
        background: #fff;
        min-height: 20px;
        height: auto;
        border: 1px #ccc solid;
        padding:5px;
        cursor: pointer;
    }
    .dep_list_outcome li:hover{
        background: #ddd;
    }
</style>
<form method="GET" action="flight_loading">
    <div class="tabbable">
        <ul class="nav nav-pills nav-sm nav-no-br mb11" id="flightChooseTab">
<!--            <li class="active"><a href="#flight-search-1" data-toggle="tab">Round Trip</a>
            </li>-->
            <li class="active trip_tabs" id="trip_1_tab"><a href="#flight-search-2" data-toggle="tab">One Way</a>
            <li id="trip_2_tab" class="trip_tabs"><a href="#flight-search-2" data-toggle="tab">Two Way</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="flight-search-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                            <label>Departure</label>
                            <input class="form-control" autocomplete="off" placeholder="City, Airport, U.S. Zip" type="text" id="flight_dep" name="departure" />
                            <div class="dep_list_id" style="width: 100%;height:auto;position: absolute;top: 74px;">
                                <ul class="dep_list_outcome">
                                </ul>
                            </div>
                            <input type="hidden" placeholder="" name="depart_code" value="" class="move_code"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                            <label>Destination</label>
                            <input class="form-control" autocomplete="off" placeholder="City, Airport, U.S. Zip" type="text" id="flight_des" name="destination"/>
                            <div class="dep_list_id" style="width: 100%;height:auto;position: absolute;top: 74px;">
                                <ul class="dep_list_outcome">
                                </ul>
                            </div>
                            <input autocomplete="off" type="hidden" placeholder="" name="destin_code" value="" class="move_code"/>
                        </div>
                    </div>
                </div>
                <div class="input-daterange" data-date-format="yyyy-mm-dd">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-group-lg form-group-icon-left">
                                <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                <label>Departing</label>
                                <input autocomplete="off" class="form-control" name="start" type="text" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                <label>Returning</label>
                                <input autocomplete="off" class="form-control" name="end" type="text" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-lg form-group-select-plus">
                                <label>Passengers</label>
<!--                                <div class="btn-group btn-group-select-num" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" name="options" />1</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />2</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />3</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />3+</label>
                                </div>-->
                                <select class="form-control" name="passengers">
                                    <?php 
                                        for($k=1; $k<6; $k++){
                                            echo "<option value='$k'>$k</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="1" name="trip_count" id="trip_count" class="trip_count"/>

        </div>
    </div>
    <button class="btn btn-primary btn-lg" type="submit">Search for Flights</button>
</form>
<!--            <div class="tab-pane fade" id="flight-search-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                            <label>From</label>
                            <input class="typeahead form-control" placeholder="City, Airport, U.S. Zip" type="text" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                            <label>To</label>
                            <input class="typeahead form-control" placeholder="City, Airport, U.S. Zip" type="text" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                            <label>Departing</label>
                            <input class="date-pick form-control" data-date-format="M d, D" type="text" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg form-group-select-plus">
                            <label>Passngers</label>
                            <div class="btn-group btn-group-select-num" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" name="options" />1</label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="options" />2</label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="options" />3</label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="options" />3+</label>
                            </div>
                            <select class="form-control hidden">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>-->
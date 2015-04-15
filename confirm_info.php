<?php
$info = $_SESSION['aviator_user']['info'];
$flight = 'Flight (Inbound & outbound)';
$origin = $_SESSION['arrRef1'][$_SESSION['DEPART_CODE']]['description'].', '.$_SESSION['arrRef1'][$_SESSION['DEPART_CODE']]['country'].' ['.$_SESSION['DEPART_CODE'].']';
$o_date = $_SESSION['START'];
$destin = $_SESSION['arrRef1'][$_SESSION['DESTIN_CODE']]['description'].', '.$_SESSION['arrRef1'][$_SESSION['DESTIN_CODE']]['country'].' ['.$_SESSION['DESTIN_CODE'].']';
?>
<div class="col-md-6">
    <!--<div class="gap gap-small"></div>-->
    <h3>Confirm your booking to proceed</h3>
    <p>Sign in to your account or register below as a new user to continue your booking</p>
    <ul class="list booking-item-passengers">
        <li style="padding-bottom: 0px;margin-bottom: 0px;">
            <div class="row">
               <!--<div class="row">-->
                <h4>Booking details</h4>
                <table class="table" style="margin-bottom: 0px;">
                        <tbody>
                            <tr>
                                <td class='thelabe'>Fullname</td>
                                <td><?php echo $info['u_fname'].', '.$info['u_lname']?></td>
                            </tr>
                            <tr>
                                <td class='thelabe'>Service </td>
                                 <td><?php echo $flight; ?></td>
                            </tr>
                            <tr>
                                <td class='thelabe'>Origin/Departure</td>
                                <td><?php echo $origin; ?></td>
                            </tr>
                            <tr>
                                <td class='thelabe'>Destination/Arrival </td>
                               <td><?php echo $destin; ?></td>
                            </tr>
                            <tr>
                                <td class='thelabe'>Passengers Count</td>
                                <td><?php echo $passengers; ?></td>
                            </tr>
                            <tr>
                                <td class='thelabe'>Departure Date</td>
                                <td><?php echo $o_date. ' [M/Y/D]'; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <!--</div>-->
            </div>
           
           
        </li>
    </ul>
    <!--<div class="gap gap-small"></div>-->
</div>
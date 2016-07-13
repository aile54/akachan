<!--<div style="position: fixed; left: 0px; bottom: 150px; background-image: url(../Templates/Content/images/feedback/userSurvey-02.png);
    width: 58px; z-index: 1000; overflow: hidden; background-position: 100% 50%;
    background-repeat: no-repeat no-repeat;" id="block_inquiry">
    <a data-toggle="modal" href="#feedbackModal" onclick="loadFeedback()">
        <img src="../Templates/Content/images/feedback/userSurvey-01.png" style="margin-top: 8px; padding-bottom: 12px"
            id="go1">
    </a>
</div>-->
<!-- ================ Modal for Survey ================ -->
<div id="feedbackModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none; width: 500px">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="reloadDone()">
            ×</button>
        <h3 id="myModalLabel" style="font-size: 20px;">
            Feedback for
            <label id="nameOnlineShop" style="font-style: oblique; font-size: 20px; color: red">
            </label>
        </h3>
    </div>
    <div class="modal-body" id="feedbackBody">
    </div>
    <div class="modal-footer">
        <input type="submit" value="Send" onclick="sendFeedback()" class="btn btn-success">
    </div>
</div>
<!-- ================ END Modal for Survey ================ -->
<!-- Modal -->
<div class="modal fade" id="sendMessageModal" tabindex="-1" role="dialog" aria-labelledby="sendMessageModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form name="sendMessageForm" method="post" action="" id="send-message-form" style="width: 50%; margin:auto;">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendMessageModalTitle">Messages</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="lead_id" id="lead_id_for_message" value="">
                <div class="modal-body">
                    <div class="col-lg-12 messages overflow-auto" style="height: 250px;">










                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label class="infoTitle">Message</label>
                            <div class="input-form">
                                <textarea name="message" id="message" class="form-control" placeholder="Leave a message" value="<?php echo e(old('message')); ?>"></textarea>
                            </div>
                            <label for="error_message" id="error_message" class="errors" style="color:red"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary" id="sendMessageModalBtn">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /home/sellhwja/cnbcrm.org/resources/views/admin/leads/modals/send-message.blade.php ENDPATH**/ ?>
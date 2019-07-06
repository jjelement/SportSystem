@push('stylesheet')
    <style>
        .ticket-type-box > div {
            border-bottom: 1px solid #eff2f7 !important;
            padding-bottom: 15px !important;
            margin-bottom: 15px !important;
        }
    </style>
@endpush

<div class="form-group">
    <h4 class="col-md-offset-2 col-md-3" style="margin-bottom: 0px">ประเภทบัตร</h4>
    <h4 class="col-md-2" style="margin-bottom: 0px">ราคา</h4>
    <h4 class="col-md-4" style="margin-bottom: 0px">จำนวนที่ขาย <small>(เว้นว่าง ถ้าไม่จำกัด)</small></h4>
</div>

<div class="form-group">
    <div class="ticket-type-box">
        <div>
            <div class="col-md-offset-2 col-md-3">
                <input type="text" name="raceType[name][]" class="form-control" value="" required>
            </div>
            <div class="col-md-2">
                <input type="number" name="raceType[price][]" class="form-control" value="" required>
            </div>
            <div class="col-md-2">
                <input type="number" name="raceType[maxParticipants][]" class="form-control" value="">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-9 text-right">
        <button type="button" class="btn-add btn btn-success"><i class="fa fa-plus"></i> Add</button>
    </div>
</div>

@push('javascript')
    <div id="ticket-type-template" style="display: none;">
        <div class="col-md-2 text-right">
            <button type="button" class="btn-remove btn btn-danger"><i class="fa fa-remove"></i></button>
        </div>
        <div class="col-md-3">
            <input type="text" name="raceType[name][]" class="form-control" value="" required>
        </div>
        <div class="col-md-2">
            <input type="number" name="raceType[price][]" class="form-control" value="" required>
        </div>
        <div class="col-md-2">
            <input type="number" name="raceType[maxParticipants][]" class="form-control" value="">
        </div>
        <div class="clearfix"></div>

    </div>
    <script>
        $(function() {
            let raceTypeList = @json(old('raceType', isset($raceTypeList) ? $raceTypeList : null));

            $('.btn-add').click(function() {
                $('#ticket-type-template')
                    .clone()
                    .appendTo('.ticket-type-box')
                    .removeAttr('id')
                    .show();

                $('.btn-remove').unbind().click(function() {
                    $(this).parent().parent().remove();
                })
            })

            if(raceTypeList) {
                console.log(raceTypeList)
                let typeCount = raceTypeList['name'].length;
                for(let i = 0; i < typeCount; i++) {
                    if(i > 0) {
                        $('.btn-add').click();
                    }
                    $raceTypeDiv = $('.ticket-type-box > div').last()
                    $raceTypeDiv.find('[name="raceType[name][]"]').val(raceTypeList['name'][i])
                    $raceTypeDiv.find('[name="raceType[price][]"]').val(raceTypeList['price'][i])
                    $raceTypeDiv.find('[name="raceType[maxParticipants][]"]').val(raceTypeList['maxParticipants'][i])
                }
            }
        })
    </script>
@endpush
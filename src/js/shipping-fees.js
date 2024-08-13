(function($){$(document).ready(function(){
    const WEIGHT_RANGE_ROW_COUNT_ID = '#weight-range-row-count-id';
    const WEIGHT_RANGE_ROW_SECTION_WRAPPER = '.weight-range-row-section-wrapper';
    const WEIGHT_RANGE_ROW_WRAPPER = '.weight-range-row-wrapper';
    const WEIGHT_RANGE_ROW_WRAPPER_ID_PREFIX = '#weight-range-row-wrapper-id-';
    const WEIGHT_ADD_NEW_ROW_BUTTON = '#weight-add-new-range-row-button';
    const ROW_TEMPLATE = `
        <div class="range-row-wrapper" id="weight-range-row-wrapper-id-{row-serial}">
        From
        <input type="text"
          id="{id-weight-form}"
          name="{name-weight-form}"  
        />
        To
        <input type="text"
          id="{id-weight-to}"
          name="{name-weight-to}"  
        />
        Fee
        <input type="text"
          id="{id-weight-fee}"
          name="{name-weight-fee}"  
        />
        <div class="remove-row-button" data-id="{row-serial}">Remove</div>
        </div>
    `;

    /**
     * Removes row from weight based range settings
     *
     * @since TSM_SINCE
     *
     * @param e
     */
    function remove_row( e ) {
        e.preventDefault();
        console.log( "row_remove" );
        let row_id = $(e.target).data( 'id' );
        console.log( row_id );
    }

    $(WEIGHT_ADD_NEW_ROW_BUTTON).on( 'click', function() {
        let serial = Number.parseInt( $( WEIGHT_RANGE_ROW_COUNT_ID ).val(), 10 );
        serial = serial + 1;
        $( WEIGHT_RANGE_ROW_COUNT_ID ).val( serial );
        let baked_template = ROW_TEMPLATE
            .replace( '{row-serial}', serial.toString() )
            .replace( '{name-weight-form}', 'weight-based-range-unit-rules[][weight-from]' )
            .replace( '{id-weight-form}', `weight-based-range-unit-rules_${serial - 1}_weight-from` )
            .replace( '{name-weight-to}', 'weight-based-range-unit-rules[][weight-to]' )
            .replace( '{id-weight-to}', `weight-based-range-unit-rules_${serial - 1}_weight-to` )
            .replace( '{name-weight-fee}', 'weight-based-range-unit-rules[][weight-fee]' )
            .replace( '{id-weight-fee}', `weight-based-range-unit-rules_${serial - 1}_weight-fee` );
        let new_node = $( baked_template );
        new_node.find( '.remove-row-button' ).on( 'click', remove_row );
        $( WEIGHT_RANGE_ROW_SECTION_WRAPPER ).append( new_node );
    });
})})(jQuery)
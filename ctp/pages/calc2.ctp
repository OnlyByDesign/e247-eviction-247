<style>
    header {display: none; visibility: hidden;}
    footer {display: none; visibility: hidden;}
    div {vertical-align: top; font-size: 18px;}
    .center {overflow: hidden;}
</style>
<div id="wrapper" class="center">
    
    <div class="calculator">

        <div id="calcClose" onclick="window.parent.jQuery('#includedContent iframe').slideUp('slow');"><i class="fas fa-times"></i></div>

        <div class="calc_hd center divFeeDetails">
            <h2>Estimated Court Costs:<sup>*</sup></h2>
            <div class="col-xs-1 strike center"></div>
        </div>

        <div class="calc_input col-xs-3 center inline">
            <div class="center">
                <div id="labelState" class="left inline">Select state:</div>
                <div id="selectState" class="right inline">
                    <select name="data[State][name]" id="StateName1">
                    <option value="FL">Florida</option>
                    <option value="NC">North Carolina</option>
                    <option value="TX">Texas</option>
                    <option value="SC">South Carolina</option>
                    <option value="IL">Illinois</option>
                </select></div>
            </div>

            <div class="center">    
                <div id="labelState" class="left inline">Select county:</div>
                <div id="selectCounty" class="right inline">
                    <select name="data[County][name]" id="CountyName1">
                <option value="40">Alachua</option>
                <option value="41">Baker</option>
                <option value="55">Bay</option>
                <option value="42">Bradford</option>
                <option value="64">Brevard</option>
                <option value="63">Broward</option>
                <option value="56">Calhoun</option>
                <option value="70">Charlotte</option>
                <option value="33">Citrus</option>
                <option value="9">Clay</option>
                <option value="71">Collier</option>
                <option value="26">Columbia</option>
                <option value="51">Dade</option>
                <option value="52">DeSoto</option>
                <option value="27">Dixie</option>
                <option value="2">Duval</option>
                <option value="16">Escambia</option>
                <option value="12">Flagler</option>
                <option value="20">Franklin</option>
                <option value="21">Gadsden</option>
                <option value="43">Gilchrist</option>
                <option value="72">Glades</option>
                <option value="57">Gulf</option>
                <option value="28">Hamilton</option>
                <option value="48">Hardee</option>
                <option value="73">Hendry</option>
                <option value="34">Hernando</option>
                <option value="49">Highlands</option>
                <option value="15">Hillsborough</option>
                <option value="58">Holmes</option>
                <option value="66">Indian River</option>
                <option value="59">Jackson</option>
                <option value="22">Jefferson</option>
                <option value="29">Lafayette</option>
                <option value="35">Lake</option>
                <option value="74">Lee</option>
                <option value="23">Leon</option>
                <option value="44">Levy</option>
                <option value="24">Liberty</option>
                <option value="30">Madison</option>
                <option value="53">Manatee</option>
                <option value="36">Marion</option>
                <option value="67">Martin</option>
                <option value="62">Monroe</option>
                <option value="3">Nassau</option>
                <option value="17">Okaloosa</option>
                <option value="68">Okeechobee</option>
                <option value="46">Orange</option>
                <option value="47">Osceola</option>
                <option value="61">Palm Beach</option>
                <option value="38">Pasco</option>
                <option value="39">Pinellas</option>
                <option value="50">Polk</option>
                <option value="13">Putnam</option>
                <option value="18">Santa Rosa</option>
                <option value="54">Sarasota</option>
                <option value="65">Seminole</option>
                <option value="11">St. Johns</option>
                <option value="69">St. Lucie</option>
                <option value="37">Sumter</option>
                <option value="31">Suwannee</option>
                <option value="32">Taylor</option>
                <option value="45">Union</option>
                <option value="14">Volusia</option>
                <option value="25">Wakulla</option>
                <option value="19">Walton</option>
                <option value="60">Washington</option>
                </select>
                </div>
            </div>

            <div class="center">
            <div id="labelDefendantsNumber" class="left inline">Enter number of defendants:</div>
            <div id="selectDefendants" class="right inline">
                <select name="data[Defendants][number]" id="DefendantsNumber1" onchange="calculateFees(1);">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                </select></div>	
            </div>
        </div>

        <div class="estimate col-xs-3 center inline estimate">	

            <div class="center">
                <input type="hidden" id="hidFeeSummons1" value="10.00">
                <div class="left divFeeDetails inline">Issuance of Summons:</div>
                <div id="divFeeSummons1" class="right divCalculatorFee inline">$60.00</div>
            </div>

            <div class="center">
                <input type="hidden" id="hidFeeProcess1" value="40.00">
                <div class="left divFeeDetails inline">Process Server:</div>
                <div id="divFeeProcess1" class="right divCalculatorFee inline">$240.00</div>
            </div>

            <div class="center">
                <input type="hidden" id="hidFeeWrit1" value="90.00">
                <div class="left divFeeDetails inline">Writ of Possession:</div>
                <div id="divFeeWrit1" class="right divCalculatorFee inline">$90.00</div>
            </div>

            <div class="center">
                <input type="hidden" id="hidFeeWrit1_add" value="">
                <div class="left divFeeDetails inline">Issuance of Writ of Possession:</div>
                <div id="divFeeWritIssuance1" class="right divCalculatorFee inline">$0.00</div>
            </div>

            <div class="center">
                <input type="hidden" id="hidFeeFiling1" value="190.00">
                <div class="left divFeeDetails inline">Clerk Filing Fee:</div>
                <div id="divFeeFiling1" class="right divCalculatorFee inline">$190.00</div>
            </div>

        </div>

        <div class="calc_total col-xs-3 center inline">
            <div class="inline divFeeDetails total"><strong>Total:</strong></div>
            <div class="inline total divCalculatorFee" id="divFeeTotal1">$580.00</div>

            <a class="iframe cboxElement" href="/files/samplefeeagreement_evictiononly.html" style="display: block" download><p>view sample fee agreement<i class="fa fa-caret-right inline" aria-hidden="true"></i></p></a>

            <span class="col-xs-12 calculatorDisclaimer"><sup>*</sup>Your actual final costs may vary based on the facts of your case.</span>
        </div>

    </div>
    
</div>
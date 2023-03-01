@extends('master')

@section('title', 'FAQs - SMT')
@section('content')
<!-- main -->
        <main class="main">
           <div id="faq" class="container-fluid position-relative px-0 " >
            <div class="container text-start py-4 p-md-4 p-lg-5 position-relative" style="z-index: 4; min-height: 80vh;">
                <h2 class=" mb-3 mb-md-3 mb-lg-4 heading fw-bolder">FAQs (Frequently Asked Question)</h2>

                <!-- Accordion -->
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- ONe -->
                    <div class="accordion-item shadow-sm mb-2">
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#flushQuestionOne" aria-expanded="false" aria-controls="flushQuestionOne">
                            <span class="fw-bolder question">Who Is the Builder and What Is Their Reputation?
                            </span>
                        </button>
                      </h2>
                      <div id="flushQuestionOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body text-start">
                            Your satisfaction with your home will depend on the quality of the craftsmanship and the building materials used. Find out who the builder is and ask if they have any previous builds you can tour. Take a drive around previously built neighborhoods and ask residents their thoughts about the builder.

                              You can also check for reviews online using websites like the Better Business Bureau. You may also want to ask about who will oversee construction and which employees will be doing the building, because your home is in their hands. 
                        </div>
                      </div>
                    </div>
                    <!-- Two -->
                    <div class="accordion-item shadow-sm mb-2">
                      <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flushQuestionTwo" aria-expanded="false" aria-controls="flushQuestionTwo">
                            <span class="fw-bolder question">
                                How Long Will It Take to Build the Home?
                            </span>
                        </button>
                      </h2>
                      <div id="flushQuestionTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body text-start">
                            Builders should be able to provide an estimate of how long the build will take to complete. Although they can’t predict unexpected delays, the estimate should help you make a rough plan for when you can move in and how long you will need to stay in your current home. Make sure the estimate includes the time needed to get all of the necessary permits, because that can take a while.Ask them what happens if there are delays, and whether it’s possible to include a per diem payment in the event that your construction goes beyond its deadline.
                        </div>
                      </div>
                    </div>
                    <!-- Three -->
                    <div class="accordion-item shadow-sm mb-2">
                      <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flushQuestionThree" aria-expanded="false" aria-controls="flushQuestionThree">
                            <span class="fw-bolder question">Which Features Are Standard and Which Are Upgrades?
                            </span>
                        </button>
                      </h2>
                      <div id="flushQuestionThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body text-start">
                            When you tour the model home, remember that model homes typically include all the bells and whistles, but most of those upgrades cost extra. Ask exactly which features are included with the base price of the home, as well as when you will need to decide on the upgrades you want in your home. Get the prices for everything so you can determine whether it would be cheaper to pay for an upgrade or buy and install a feature or appliance yourself.
                        </div>
                      </div>
                    </div>
                    <!-- Four -->
                    <div class="accordion-item shadow-sm mb-2">
                        <h2 class="accordion-header" id="flush-headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flushQuestionFour" aria-expanded="false" aria-controls="flushQuestionFour">
                              <span class="fw-bolder question">Does the Home Include a Warranty and What Are Its Details?
                              </span>
                          </button>
                        </h2>
                        <div id="flushQuestionFour" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body text-start">
                            Most home builders offer some sort of warranty, but details can vary. Ask what is included in the warranty and how long it lasts (six months, one year, 10 years). It’s best to do this before closing, when you have a bit more leverage. The last thing you want is to move into your new home and have something break, only to find out your warranty doesn’t cover the repairs.
                          </div>
                        </div>
                      </div>
                      <!-- Five -->
                    <div class="accordion-item shadow-sm mb-2">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flushQuestionFive" aria-expanded="false" aria-controls="flushQuestionFive">
                            <span class="fw-bolder question">Does the Home Price Include the Land?
                            </span>
                        </button>
                    </h2>
                    <div id="flushQuestionFive" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body text-start">
                        There are three main options for buying a new construction home.<br>
                        <div class="ps-2">
                            <b>Option one:</b> Buy a lot of land and then hire an independent builder to construct a completely custom home.<br>
                            <b>Option two:</b> Buy a "builder house," or a new, move-in ready home built by a builder company on a lot of land, not in a new construction neighborhood. <br>
                            <b>Option three: </b> Buy a spec home in a new construction neighborhood. In this scenario, you will choose from a few different predetermined home styles to be built in a neighborhood with mostly new homes. <br>
                        </div>
                        
                        The price of land is almost never a factor when purchasing a new construction home, unless you are buying the land and hiring the builder, as in scenario one. 
                        </div>
                    </div>
                    </div>
                    <!-- Six -->
                    <div class="accordion-item shadow-sm mb-2">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flushQuestionSix" aria-expanded="false" aria-controls="flushQuestionSix">
                            <span class="fw-bolder question">Will I Be Able to Tour the Home During Construction?
                            </span>
                        </button>
                    </h2>
                    <div id="flushQuestionSix" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body text-start">
                        Some builders are restrictive about this. See if you can do periodic check-ins to make sure things are coming along as you envisioned. It’s usually better for both parties if you request adjustments early on in the building process, before the final touches are complete.
                        </div>
                    </div>
                    </div>
                    <!-- Seven -->
                    <div class="accordion-item shadow-sm mb-2">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flushQuestionSeven" aria-expanded="false" aria-controls="flushQuestionSeven">
                                <span class="fw-bolder question">Can I Hire a Home Inspector to Examine the Property?
                                </span>
                            </button>
                        </h2>
                        <div id="flushQuestionSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-start">
                                Just because the home is new doesn’t mean it’s without defect. It’s recommended to hire an independent inspector to make sure everything is being built to code. Have them examine the home at two different times—once before finishes are complete and once before closing.
                            </div>
                        </div>
                    </div>
                    <!-- Eight -->
                    <div class="accordion-item shadow-sm mb-2">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flushQuestionEight" aria-expanded="false" aria-controls="flushQuestionEight">
                                <span class="fw-bolder question">Are There Any Incentives for Going with the Builder’s Preferred Lender and/or Title Company?
                                </span>
                            </button>
                        </h2>
                        <div id="flushQuestionEight" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-start">
                                Builders sometimes prefer to keep everything in-house in order to lower costs. They often offer incentives, such as discounted closing costs or deals on upgrades, for working with their preferred lender. However, a builder offering incentives to go with a specific lender doesn’t mean that you should just automatically select that lender. 

                                Work with a lender you trust to ensure you’re getting the best loan for you. Look for lenders that provide excellent customer service, guidance, and take a consultative approach. Chat with a radius financial group loan officer today for a free personalized consultation. 
                            </div>
                        </div>
                    </div>
                    <!-- Nine -->
                    <div class="accordion-item shadow-sm mb-2">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flushQuestionNine" aria-expanded="false" aria-controls="flushQuestionNine">
                                <span class="fw-bolder question"> Are There Any Homeowner Association Rules or Regulations?
                                </span>
                            </button>
                        </h2>
                        <div id="flushQuestionNine" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-start">
                                Homeowner associations sometimes have rules that prohibit things like building sheds, planting a garden, or painting your house. If your ideal lifestyle can’t be realized within the confines of the neighborhood rules, it’s best to know that from the start.
                            </div>
                        </div>
                    </div>
                    <!-- ten -->
                    <div class="accordion-item shadow-sm mb-2">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flushQuestionTen" aria-expanded="false" aria-controls="flushQuestionTen">
                                <span class="fw-bolder question">What Amenities Come with the Neighborhood?
                                </span>
                            </button>
                        </h2>
                        <div id="flushQuestionTen" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-start">
                                When buying a new construction home in a neighborhood development, you’re often buying a lifestyle. Make sure that lifestyle suits your tastes and comes with the amenities most important to you. Some neighborhoods feature a pool, park, gym, or other perks that make the area more appealing.  
                            </div>
                        </div>
                    </div>
                    <!-- eleven -->
                    <div class="accordion-item shadow-sm mb-2">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flushQuestionEleven" aria-expanded="false" aria-controls="flushQuestionEleven">
                                <span class="fw-bolder question">What Are the Future Plans for the Neighborhood?
                                </span>
                            </button>
                        </h2>
                        <div id="flushQuestionEleven" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-start">
                                There are a lot of unknowns that come with neighborhoods hot off the press. Ask how many houses the builder plans to construct in the community and where they are in the process. You may have to deal with construction noise and inconvenience for a while. 

                                It’s also a good idea to ask whether the builder sells to investors, because investors typically have less of a stake in a neighborhood and will be more likely to bail if the market dips. You could also check with the city planner’s office to learn about the plans for the area and whether there are any upcoming building projects that could change the landscape of your neighborhood. 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EndAccordion -->

            </div>
            <div class="w-100 position-fixed bottom-0 bgTermsAndCondition">
                <img src="./image/bgfortermsandcondition.png" alt="" class="w-100 h-100">
            </div>
           </div>
        </main>
<!-- end main -->
@endsection
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- CALL TO ACTION -->
    <section class="container text-center mb-5">
        <p class="lead mb-4">A subscription for writers who want fast, reliable edits—every draft, every time.</p>
        <p class="lead mb-4 red-border">Sign up below to become a trial member so you can claim your free sample edit.</p>
        <a href="{{ route('register') }}" class="d-inline-block mt-4 btn btn-upworde btn-lg">Upword Your Draft</a>
    </section>

    <!-- HOW IT WORKS -->
    <section class="container py-5">
        <h2 class="text-center mb-4">How It Works</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <h5>1. Subscribe</h5>
                <p class="justified">You pay a membership fee monthly to get your manuscript proofread.
                    Your membership includes more than just proofreading. <a href="#" data-bs-toggle="modal" data-bs-target="#pricingModal">Click here for the details and pricing.</a></p>
            </div>
            <div class="col-md-4">
                <h5>2. Submit</h5>
                <p class="justified">You upload your file—we call it <span style="color: var(--contrast)">upwording</span>—then you pay for your extras.
                    You'll receive a confirmation and a deadline (for us to return it).</p>
            </div>
            <div class="col-md-4">
                <h5>3. Share</h5>
                <p class="justified">You get a clean, clear file—on time, every time. After you revise,
                    you'll likely publish your work, whether that's on a blog or in a bookstore.</p>
            </div>
        </div>
    </section>

    <!-- MODAL -->
    <div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content upworde-light-bg">
                <div class="modal-header">
                    <h5 class="modal-title" id="pricingModalLabel">Membership Pricing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Pricing – $99/month</h6>
                    <ul>
                        <li>Proofreading up to 10,000 words</li>
                        <li>Unused words roll over for 12 months</li>
                        <li>Coded highlights for content-level issues</li>
                        <li>Optional upsells available</li>
                    </ul>
                    <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('register') }}" class="btn btn-upworde">Free Sample Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection

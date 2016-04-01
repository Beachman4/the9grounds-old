@extends('master.master')
@section('content')
    <div class="row">
        <div class="small-12 columns">
            <h1>About the Creator</h1>
            <br />
            <h4>Aylon "MasterYodA" Armstrong</h4>
            <p>Aylon has been programming in PHP for close to 6-7 years.  He currently works at GroupM7 Design as a Programmer.  A jack of all trades, really, as all Full stack developers are.</p>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns" style="color: white;">
            <h1>How did you get the name The Nine Grounds?</h1>
            <h5>IDK.  Ask Sanfos at <a href="http://taw.net" style="color: white; text-decoration: none;">Taw</a></h5>
        </div>
    </div>
    <div class="row" style="margin-top: 3rem;">
        <div class="small-12 columns">
            <div style="width: 100%; border-bottom: 1px solid grey">
                <h1>Contact Us</h1>
            </div>
            <form method="post" action="/contact">
                <div class="row">
                    <div class="small-12 large-6 large-offset-3 columns">
                        <label>Name
                            <input type="text" name="name">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 large-6 large-offset-3 columns">
                        <label>Email
                            <input type="email" name="email">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 large-6 large-offset-3 columns">
                        <label>Message
                            <textarea name="message" rows="5"></textarea>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="small-2 large-6 large-offset-3 columns">
                        <button type="submit" class="button success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
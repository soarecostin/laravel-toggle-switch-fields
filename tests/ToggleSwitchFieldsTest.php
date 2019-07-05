<?php

namespace SoareCostin\LaravelToggleSwitchFields\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use SoareCostin\LaravelToggleSwitchFields\Traits\Switchable;
use SoareCostin\LaravelToggleSwitchFields\Facades\ToggleSwitchFields;

class ToggleSwitchFieldsTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return ['SoareCostin\\LaravelToggleSwitchFields\\ToggleSwitchFieldsServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ToggleSwitchFields' => 'SoareCostin\\LaravelToggleSwitchFields\\Facades\\ToggleSwitchFields',
        ];
    }

    /**
     * Setup the test environment.
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        // and other test setup steps you need to perform
    }

    /** @test */
    public function has_toggle_switch_routes()
    {
        ToggleSwitchFields::routes('/admin/resource/{resource}', 'SoareCostin\LaravelToggleSwitchFields\Tests\TestController', 'admin.resource');

        $this->assertTrue(Route::has('admin.resource.on'));
    }

    /** @test */
    public function cannot_switch_on_a_field_that_is_not_added_to_the_switchable_fields()
    {
        ToggleSwitchFields::routes('/admin/resource/{resource}', 'SoareCostin\LaravelToggleSwitchFields\Tests\TestController', 'admin.resource');

        $resource = new SwitchableResource();
        $resource->save();

        $response = $this->get(route('admin.resource.on', [$resource, 'other-field']));

        $response->assertStatus(404);
    }

    /** @test */
    public function can_switch_on_a_resource()
    {
        ToggleSwitchFields::routes('/admin/resource/{resource}', 'SoareCostin\LaravelToggleSwitchFields\Tests\TestController', 'admin.resource');

        $resource = new SwitchableResource();
        $resource->save();

        $controller = new TestController();
        $response = $controller->switchOn($resource, 'published');

        $this->assertEquals($resource->published, true);
    }

    /** @test */
    public function can_switch_off_a_resource()
    {
        ToggleSwitchFields::routes('/admin/resource/{resource}', 'SoareCostin\LaravelToggleSwitchFields\Tests\TestController', 'admin.resource');

        $resource = new SwitchableResource();
        $resource->published = true;
        $resource->save();

        $controller = new TestController();
        $response = $controller->switchOff($resource, 'published');

        $this->assertEquals($resource->published, false);
    }
}

class TestController extends Controller
{
    use Switchable;
}

class SwitchableResource extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'published',
    ];
}

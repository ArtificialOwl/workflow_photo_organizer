<?php

declare(strict_types=1);


/**
 * WorkflowPhotoOrganizer - Organize your Photos
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2022
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


namespace OCA\WorkflowPhotoOrganizer\AppInfo;


use OCA\WorkflowPhotoOrganizer\Listener\RegisterFlowOperationsListener;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\WorkflowEngine\Events\RegisterOperationsEvent;


class Application extends App implements IBootstrap {

	public const APP_ID = 'workflow_photo_organizer';
	public const APP_NAME = 'Workflow Photo Organizer';


	public function __construct(array $params = []) {
		parent::__construct(self::APP_ID, $params);
	}


	public function register(IRegistrationContext $context): void {
		$context->registerEventListener(
			RegisterOperationsEvent::class,
			RegisterFlowOperationsListener::class
		);
	}

	public function boot(IBootContext $context): void {
	}
}
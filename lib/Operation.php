<?php
/**
 * @copyright Copyright (c) 2018 Arthur Schiwon <blizzz@arthur-schiwon.de>
 *
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 *
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

namespace OCA\WorkflowPhotoOrganizer;

use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\GenericEvent;
use OCP\IURLGenerator;
use OCP\WorkflowEngine\IOperation;
use OCP\WorkflowEngine\IRuleMatcher;

class Operation implements IOperation {

	/** @var IURLGenerator */
	private $urlGenerator;


	public function __construct(IURLGenerator $urlGenerator) {
		$this->urlGenerator = $urlGenerator;
	}

	public function validateOperation(string $name, array $checks, string $operation): void {
	}

	public function getDisplayName(): string {
		return 'Photo Organizer';
	}

	public function getDescription(): string {
		return 'Organize your Photos';
	}

	public function getIcon(): string {
		return $this->urlGenerator->imagePath('workflow_photo_organizer', 'app.svg');
	}

	public function isAvailableForScope(int $scope): bool {
		return true;
	}

	public function onEvent(string $eventName, Event $event, IRuleMatcher $ruleMatcher): void {
		if (!$event instanceof GenericEvent) {
			return;
		}

		$node = $event->getSubject();
		\OC::$server->getLogger()->log(
			3, 'Operation::onEvent ' . $eventName . ', '
			   . json_encode($node->getPath())
		);
	}
}
